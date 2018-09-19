local lor = require("lor.index")
local session_util = require("app.libs.session")
local redis = require("app.libs.redis")
local redis_config = require("app.config.config").redis
local red = redis:new(redis_config)
local pairs = pairs
local ipairs = ipairs
local len = table.getn
local utils = require("app.libs.utils")
local direct_order_model = require("app.model.direct_order")
local order_model = require("app.model.order")
local payRouter = lor:Router()

local function analyze(ret)
	local rstatus = ret.status
	local rheader = ret.rheader
	local rbody = ret.body
	if rstatus ~= ngx.HTTP_OK then
		ngx.log(ngx.ERR, 'connect weixin error with: ', rstatus)
		return nil, 'connect weixin error with http code ' .. rstatus
	end
	rbody = utils.json_decode(ret.body)
	if rbody and rbody.errcode and 0 ~= rbody.errcode then
		local errmsg = rbody.errmsg or ''
		-- if weixin_errcode[rbody.errcode] then
		-- 	errmsg = errmsg .. "," .. weixin_errorcode[rbody.errcode]
		-- end
		ngx.log(ngx.ERR, errmsg)
		return nil, errmsg
	end
	return rbody, nil
end

-- 获取微信支付JS-SDK配置 sn-订单号 openid-用户openid
local function getweixinpayconfig(sn, openid)
    -- 获取用户opendid相关信息 http://weixin.here.cn/jsapipay.php?sn=do2016121231212312146467&openid=oa_v3t1rR3JDKfg6yRzIvAhYzCJ4
    local url = '/p2weixinpackage/jsapipay.php'

    -- https://github.com/openresty/lua-nginx-module#ngxlocationcapture
    local ret = ngx.location.capture(url, {
        method = ngx.HTTP_GET,
        args = {
			sn = sn,
			openid = openid
		},
    })

	return analyze(ret)
end

--- 支付相关 type 支付类型 提问订单-0 偷听订单-1 order_id 订单ID sn 订单号 callback_url 支付成功跳转地址
payRouter:get("/order", function(req, res, next)
	local type = req.query.type and req.query.type or 0
	local order_id = req.query.order_id and req.query.order_id or 0
	local callback_url = req.query.callback_url and req.query.callback_url or "http://www.baidu.com"
	local session_user = session_util.get(req, "user")
	local session_user_id = session_user and session_user.user_id
	local order_result, order_err

	-- 根据类型和订单ID获取订单详情
	if tonumber(type) == 0 then
		order_result, order_err = direct_order_model.get_order(order_id, session_user_id)
	else
		order_result, order_err = order_model.get_order(order_id, session_user_id)
	end

	if not order_result or order_err or len(order_result) == 0 then
		res:render("/empty", { message = "亲~未找到相关订单~" })
	else
		res:json(order_result[1])
	end
	-- 根据订单状态进行判断是否继续支付

end)

--- 支付相关 type 支付类型 提问订单-0 偷听订单-1 order_id 订单ID sn 订单号 callback_url 支付成功跳转地址
payRouter:get("/order_config", function(req, res, next)
	local type = req.query.type and req.query.type or 0
	local order_id = req.query.order_id and req.query.order_id or 0
	local callback_url = req.query.callback_url and req.query.callback_url or "http://www.baidu.com"
	local session_user = session_util.get(req, "user")
	local session_user_id = session_user and session_user.user_id
	local openid = session_user and session_user.openid --用户openid
	local order_result, order_err

	-- 根据类型和订单ID获取订单详情
	if tonumber(type) == 0 then
		order_result, order_err = direct_order_model.get_order(order_id, session_user_id)
	else
		order_result, order_err = order_model.get_order(order_id, session_user_id)
	end

	local wx_order_data = {}, nil
	if not order_result or order_err or len(order_result) == 0 then
		res:json({
			success = false,
			msg = "亲~未找到相关订单~",
			data = wx_order_data
		})
	else

		local rbody = getweixinpayconfig(order_result[1]['weixin_pay_order'], openid);

		if rbody then
			-- 获取微信支付配置成功
			wx_order_data = rbody
		end
		res:json({
			success = true,
			msg = "返回成功",
			data = wx_order_data
		})
	end
	-- 根据订单状态进行判断是否继续支付

end)

return payRouter
