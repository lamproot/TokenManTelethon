"""File generated by TLObjects' generator. All changes will be ERASED"""
from ...tl.tlobject import TLObject
from ...tl.tlobject import TLRequest
from typing import Optional, List, Union, TYPE_CHECKING
import os
import struct
if TYPE_CHECKING:
    from ...tl.types import TypeInputPhoneCall, TypePhoneCallProtocol, TypeDataJSON, TypePhoneCallDiscardReason, TypeInputUser



class AcceptCallRequest(TLRequest):
    CONSTRUCTOR_ID = 0x3bd2b4a0
    SUBCLASS_OF_ID = 0xd48afe4f

    def __init__(self, peer, g_b, protocol):
        """
        :param TypeInputPhoneCall peer:
        :param bytes g_b:
        :param TypePhoneCallProtocol protocol:

        :returns phone.PhoneCall: Instance of PhoneCall.
        """
        self.peer = peer  # type: TypeInputPhoneCall
        self.g_b = g_b  # type: bytes
        self.protocol = protocol  # type: TypePhoneCallProtocol

    def to_dict(self):
        return {
            '_': 'AcceptCallRequest',
            'peer': self.peer.to_dict() if isinstance(self.peer, TLObject) else self.peer,
            'g_b': self.g_b,
            'protocol': self.protocol.to_dict() if isinstance(self.protocol, TLObject) else self.protocol
        }

    def __bytes__(self):
        return b''.join((
            b'\xa0\xb4\xd2;',
            bytes(self.peer),
            self.serialize_bytes(self.g_b),
            bytes(self.protocol),
        ))

    @classmethod
    def from_reader(cls, reader):
        _peer = reader.tgread_object()
        _g_b = reader.tgread_bytes()
        _protocol = reader.tgread_object()
        return cls(peer=_peer, g_b=_g_b, protocol=_protocol)


class ConfirmCallRequest(TLRequest):
    CONSTRUCTOR_ID = 0x2efe1722
    SUBCLASS_OF_ID = 0xd48afe4f

    def __init__(self, peer, g_a, key_fingerprint, protocol):
        """
        :param TypeInputPhoneCall peer:
        :param bytes g_a:
        :param int key_fingerprint:
        :param TypePhoneCallProtocol protocol:

        :returns phone.PhoneCall: Instance of PhoneCall.
        """
        self.peer = peer  # type: TypeInputPhoneCall
        self.g_a = g_a  # type: bytes
        self.key_fingerprint = key_fingerprint  # type: int
        self.protocol = protocol  # type: TypePhoneCallProtocol

    def to_dict(self):
        return {
            '_': 'ConfirmCallRequest',
            'peer': self.peer.to_dict() if isinstance(self.peer, TLObject) else self.peer,
            'g_a': self.g_a,
            'key_fingerprint': self.key_fingerprint,
            'protocol': self.protocol.to_dict() if isinstance(self.protocol, TLObject) else self.protocol
        }

    def __bytes__(self):
        return b''.join((
            b'"\x17\xfe.',
            bytes(self.peer),
            self.serialize_bytes(self.g_a),
            struct.pack('<q', self.key_fingerprint),
            bytes(self.protocol),
        ))

    @classmethod
    def from_reader(cls, reader):
        _peer = reader.tgread_object()
        _g_a = reader.tgread_bytes()
        _key_fingerprint = reader.read_long()
        _protocol = reader.tgread_object()
        return cls(peer=_peer, g_a=_g_a, key_fingerprint=_key_fingerprint, protocol=_protocol)


class DiscardCallRequest(TLRequest):
    CONSTRUCTOR_ID = 0x78d413a6
    SUBCLASS_OF_ID = 0x8af52aac

    def __init__(self, peer, duration, reason, connection_id):
        """
        :param TypeInputPhoneCall peer:
        :param int duration:
        :param TypePhoneCallDiscardReason reason:
        :param int connection_id:

        :returns Updates: Instance of either UpdatesTooLong, UpdateShortMessage, UpdateShortChatMessage, UpdateShort, UpdatesCombined, Updates, UpdateShortSentMessage.
        """
        self.peer = peer  # type: TypeInputPhoneCall
        self.duration = duration  # type: int
        self.reason = reason  # type: TypePhoneCallDiscardReason
        self.connection_id = connection_id  # type: int

    def to_dict(self):
        return {
            '_': 'DiscardCallRequest',
            'peer': self.peer.to_dict() if isinstance(self.peer, TLObject) else self.peer,
            'duration': self.duration,
            'reason': self.reason.to_dict() if isinstance(self.reason, TLObject) else self.reason,
            'connection_id': self.connection_id
        }

    def __bytes__(self):
        return b''.join((
            b'\xa6\x13\xd4x',
            bytes(self.peer),
            struct.pack('<i', self.duration),
            bytes(self.reason),
            struct.pack('<q', self.connection_id),
        ))

    @classmethod
    def from_reader(cls, reader):
        _peer = reader.tgread_object()
        _duration = reader.read_int()
        _reason = reader.tgread_object()
        _connection_id = reader.read_long()
        return cls(peer=_peer, duration=_duration, reason=_reason, connection_id=_connection_id)


class GetCallConfigRequest(TLRequest):
    CONSTRUCTOR_ID = 0x55451fa9
    SUBCLASS_OF_ID = 0xad0352e8

    def to_dict(self):
        return {
            '_': 'GetCallConfigRequest'
        }

    def __bytes__(self):
        return b''.join((
            b'\xa9\x1fEU',
        ))

    @classmethod
    def from_reader(cls, reader):
        return cls()


class ReceivedCallRequest(TLRequest):
    CONSTRUCTOR_ID = 0x17d54f61
    SUBCLASS_OF_ID = 0xf5b399ac

    def __init__(self, peer):
        """
        :param TypeInputPhoneCall peer:

        :returns Bool: This type has no constructors.
        """
        self.peer = peer  # type: TypeInputPhoneCall

    def to_dict(self):
        return {
            '_': 'ReceivedCallRequest',
            'peer': self.peer.to_dict() if isinstance(self.peer, TLObject) else self.peer
        }

    def __bytes__(self):
        return b''.join((
            b'aO\xd5\x17',
            bytes(self.peer),
        ))

    @classmethod
    def from_reader(cls, reader):
        _peer = reader.tgread_object()
        return cls(peer=_peer)


class RequestCallRequest(TLRequest):
    CONSTRUCTOR_ID = 0x5b95b3d4
    SUBCLASS_OF_ID = 0xd48afe4f

    def __init__(self, user_id, g_a_hash, protocol, random_id=None):
        """
        :param TypeInputUser user_id:
        :param bytes g_a_hash:
        :param TypePhoneCallProtocol protocol:
        :param int random_id:

        :returns phone.PhoneCall: Instance of PhoneCall.
        """
        self.user_id = user_id  # type: TypeInputUser
        self.g_a_hash = g_a_hash  # type: bytes
        self.protocol = protocol  # type: TypePhoneCallProtocol
        self.random_id = random_id if random_id is not None else int.from_bytes(os.urandom(4), 'big', signed=True)

    async def resolve(self, client, utils):
        self.user_id = utils.get_input_user(await client.get_input_entity(self.user_id))

    def to_dict(self):
        return {
            '_': 'RequestCallRequest',
            'user_id': self.user_id.to_dict() if isinstance(self.user_id, TLObject) else self.user_id,
            'g_a_hash': self.g_a_hash,
            'protocol': self.protocol.to_dict() if isinstance(self.protocol, TLObject) else self.protocol,
            'random_id': self.random_id
        }

    def __bytes__(self):
        return b''.join((
            b'\xd4\xb3\x95[',
            bytes(self.user_id),
            struct.pack('<i', self.random_id),
            self.serialize_bytes(self.g_a_hash),
            bytes(self.protocol),
        ))

    @classmethod
    def from_reader(cls, reader):
        _user_id = reader.tgread_object()
        _random_id = reader.read_int()
        _g_a_hash = reader.tgread_bytes()
        _protocol = reader.tgread_object()
        return cls(user_id=_user_id, g_a_hash=_g_a_hash, protocol=_protocol, random_id=_random_id)


class SaveCallDebugRequest(TLRequest):
    CONSTRUCTOR_ID = 0x277add7e
    SUBCLASS_OF_ID = 0xf5b399ac

    def __init__(self, peer, debug):
        """
        :param TypeInputPhoneCall peer:
        :param TypeDataJSON debug:

        :returns Bool: This type has no constructors.
        """
        self.peer = peer  # type: TypeInputPhoneCall
        self.debug = debug  # type: TypeDataJSON

    def to_dict(self):
        return {
            '_': 'SaveCallDebugRequest',
            'peer': self.peer.to_dict() if isinstance(self.peer, TLObject) else self.peer,
            'debug': self.debug.to_dict() if isinstance(self.debug, TLObject) else self.debug
        }

    def __bytes__(self):
        return b''.join((
            b"~\xddz'",
            bytes(self.peer),
            bytes(self.debug),
        ))

    @classmethod
    def from_reader(cls, reader):
        _peer = reader.tgread_object()
        _debug = reader.tgread_object()
        return cls(peer=_peer, debug=_debug)


class SetCallRatingRequest(TLRequest):
    CONSTRUCTOR_ID = 0x1c536a34
    SUBCLASS_OF_ID = 0x8af52aac

    def __init__(self, peer, rating, comment):
        """
        :param TypeInputPhoneCall peer:
        :param int rating:
        :param str comment:

        :returns Updates: Instance of either UpdatesTooLong, UpdateShortMessage, UpdateShortChatMessage, UpdateShort, UpdatesCombined, Updates, UpdateShortSentMessage.
        """
        self.peer = peer  # type: TypeInputPhoneCall
        self.rating = rating  # type: int
        self.comment = comment  # type: str

    def to_dict(self):
        return {
            '_': 'SetCallRatingRequest',
            'peer': self.peer.to_dict() if isinstance(self.peer, TLObject) else self.peer,
            'rating': self.rating,
            'comment': self.comment
        }

    def __bytes__(self):
        return b''.join((
            b'4jS\x1c',
            bytes(self.peer),
            struct.pack('<i', self.rating),
            self.serialize_bytes(self.comment),
        ))

    @classmethod
    def from_reader(cls, reader):
        _peer = reader.tgread_object()
        _rating = reader.read_int()
        _comment = reader.tgread_string()
        return cls(peer=_peer, rating=_rating, comment=_comment)

