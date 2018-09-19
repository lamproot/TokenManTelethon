from telethon import TelegramClient, sync,events
import logging
import random
import asyncio
import telethon
from telethon.tl.types import PeerUser, PeerChat, PeerChannel,UpdateNewChannelMessage, InputUser, InputChannel
from telethon.tl.functions.messages import SendMessageRequest,AddChatUserRequest
from telethon.tl.functions.channels import InviteToChannelRequest
from telethon.tl.functions.contacts import ResolveUsernameRequest
from telethon.tl import types, functions
from telethon import utils

# These example values won't work. You must get your own api_id and
# api_hash from https://my.telegram.org, under API Development.
# api_id = 477722
# api_hash = '794977e8805aff91758f0820f0f1d447'
api_id = 499964
api_hash = '2ea1a8f53d353b96aaf025feaf204a70'


client = TelegramClient('session_name_tokenman', api_id, api_hash)
client.start()
# print(client.get_me().stringify())
# result = client.send_message('XiaoXiongZai', 'Hello! Talking to you from Telethon')
# print(result.stringify())
# result = InviteToChannelRequestInviteToChannelRequestclient(SendMessageRequest(PeerChat(-295497883), 'Hello there!'))
# print(result)
# joinuser = client(ResolveUsernameRequest('Chennnnnn'))
user = client(ResolveUsernameRequest('Chennnnnn'))
# print(user)

# client(AddChatUserRequest(
#     chat_id = 1249040089, #chat_id
#     user_id = user.users[0].id,
#     fwd_limit=1  # Allow the user to see the 10 last messages
# ))
# client(AddChatUserRequest(
#     chat_id = 295497883, #chat_id
#     user_id = user.users[0].id,
#     fwd_limit=1  # Allow the user to see the 10 last messages
# ))
# client(InviteToChannelRequest(
#    	InputChannel(1249040089, user.users[0].access_hash), #频道id
#     users = ['Nick5277']
# ))

# client(InviteToChannelRequest(
#    	group.id, #频道id
#     users = ['Nick5277']
# ))

# group = client.get_entity("Xiaoxiongbot")
# group = client.get_entity(-1001249040089)
dialogs = client.get_dialogs()
group    = client.get_entity('t.me/joinchat/JaLiklIR3Ec7_F6QUVDt6A')
print(group)
# dialogs = client.get_dialogs()
# client(AddChatUserRequest(
#     chat_id = group.id, #chat_id
#     user_id = user.users[0].id,
#     fwd_limit=1  # Allow the user to see the 10 last messages
# ))
# my_user    = client.get_entity('pollyXstar')
# print(my_user.username)
# 打印群信息
# client(AddChatUserRequest(
#     chat_id = PeerChat(group.id), #chat_id
#     user_id = my_user.id,
#     fwd_limit=1  # Allow the user to see the 10 last messages
# ))
result = client(InviteToChannelRequest(
   	group.id, #频道id
    users = ['pollyXstar']
))
print(result)
