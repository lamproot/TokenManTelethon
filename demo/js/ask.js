$(function () {
    var str;

    $('textarea').on('keyup',function () {

        var len = $(this).val().length;
        if(len < 19){
            str = $(this).val();

            $('#word-num').html(18-len)
            $('#alert-text').html("")
        }else{
            $(this).val(str);
            $('#alert-text').html('已超出字数限制')
        }
    })

    $('#follow').on('click',function(){
        if($(this).hasClass('weui_btn_jiyu_blue')){
            $(this).removeClass('weui_btn_jiyu_blue').addClass('weui_btn_default')
            $.ajax({

            })
        }else{
            $(this).removeClass('weui_btn_default').addClass('weui_btn_jiyu_blue')
            $.ajax({

            })
        }
    })
    $('#btn-is-open').on('click', function () {
        if($(this).hasClass('open')){
            $(this).removeClass('open')
            $('#dialog2').show().on('click', '.weui_btn_dialog', function () {
                $('#dialog2').off('click').hide();
            });
            $('#dialog-text').html('私密提问,获取TA的专属语音回答');
            $('#is-open').val('0')
            $.ajax({

            })

        }else{
            $(this).addClass('open');
            $('#is-open').val('1')
            $.ajax({

            })

        }

    })

    $('#container').on('click',function () {
        if(true){
            $('#dialog2').show().on('click', '.weui_btn_dialog', function () {
                $('#dialog2').off('click').hide();
            });
            $('#dialog-text').html('偷听之后才能点击哦~');
        }
    })

})