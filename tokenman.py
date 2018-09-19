from telethon import TelegramClient

# These example values won't work. You must get your own api_id and
# api_hash from https://my.telegram.org, under API Development.
api_id = 477722
api_hash = '794977e8805aff91758f0820f0f1d447'

client = TelegramClient('session_name', api_id, api_hash)
client.start()