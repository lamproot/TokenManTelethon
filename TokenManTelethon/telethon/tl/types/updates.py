"""File generated by TLObjects' generator. All changes will be ERASED"""
from ...tl.tlobject import TLObject
from typing import Optional, List, Union, TYPE_CHECKING
import os
import struct
if TYPE_CHECKING:
    from ...tl.types import TypeUpdate, TypeChat, TypeUser, TypeEncryptedMessage, TypeMessage
    from ...tl.types.updates import TypeState



class ChannelDifference(TLObject):
    CONSTRUCTOR_ID = 0x2064674e
    SUBCLASS_OF_ID = 0x29896f5d

    def __init__(self, pts, new_messages, other_updates, chats, users, final=None, timeout=None):
        """
        :param int pts:
        :param List[TypeMessage] new_messages:
        :param List[TypeUpdate] other_updates:
        :param List[TypeChat] chats:
        :param List[TypeUser] users:
        :param Optional[bool] final:
        :param Optional[int] timeout:

        Constructor for updates.ChannelDifference: Instance of either ChannelDifferenceEmpty, ChannelDifferenceTooLong, ChannelDifference.
        """
        self.pts = pts  # type: int
        self.new_messages = new_messages  # type: List[TypeMessage]
        self.other_updates = other_updates  # type: List[TypeUpdate]
        self.chats = chats  # type: List[TypeChat]
        self.users = users  # type: List[TypeUser]
        self.final = final  # type: Optional[bool]
        self.timeout = timeout  # type: Optional[int]

    def to_dict(self):
        return {
            '_': 'ChannelDifference',
            'pts': self.pts,
            'new_messages': [] if self.new_messages is None else [x.to_dict() if isinstance(x, TLObject) else x for x in self.new_messages],
            'other_updates': [] if self.other_updates is None else [x.to_dict() if isinstance(x, TLObject) else x for x in self.other_updates],
            'chats': [] if self.chats is None else [x.to_dict() if isinstance(x, TLObject) else x for x in self.chats],
            'users': [] if self.users is None else [x.to_dict() if isinstance(x, TLObject) else x for x in self.users],
            'final': self.final,
            'timeout': self.timeout
        }

    def __bytes__(self):
        return b''.join((
            b'Ngd ',
            struct.pack('<I', (0 if self.final is None or self.final is False else 1) | (0 if self.timeout is None or self.timeout is False else 2)),
            struct.pack('<i', self.pts),
            b'' if self.timeout is None or self.timeout is False else (struct.pack('<i', self.timeout)),
            b'\x15\xc4\xb5\x1c',struct.pack('<i', len(self.new_messages)),b''.join(bytes(x) for x in self.new_messages),
            b'\x15\xc4\xb5\x1c',struct.pack('<i', len(self.other_updates)),b''.join(bytes(x) for x in self.other_updates),
            b'\x15\xc4\xb5\x1c',struct.pack('<i', len(self.chats)),b''.join(bytes(x) for x in self.chats),
            b'\x15\xc4\xb5\x1c',struct.pack('<i', len(self.users)),b''.join(bytes(x) for x in self.users),
        ))

    @classmethod
    def from_reader(cls, reader):
        flags = reader.read_int()

        _final = bool(flags & 1)
        _pts = reader.read_int()
        if flags & 2:
            _timeout = reader.read_int()
        else:
            _timeout = None
        reader.read_int()
        _new_messages = []
        for _ in range(reader.read_int()):
            _x = reader.tgread_object()
            _new_messages.append(_x)

        reader.read_int()
        _other_updates = []
        for _ in range(reader.read_int()):
            _x = reader.tgread_object()
            _other_updates.append(_x)

        reader.read_int()
        _chats = []
        for _ in range(reader.read_int()):
            _x = reader.tgread_object()
            _chats.append(_x)

        reader.read_int()
        _users = []
        for _ in range(reader.read_int()):
            _x = reader.tgread_object()
            _users.append(_x)

        return cls(pts=_pts, new_messages=_new_messages, other_updates=_other_updates, chats=_chats, users=_users, final=_final, timeout=_timeout)


class ChannelDifferenceEmpty(TLObject):
    CONSTRUCTOR_ID = 0x3e11affb
    SUBCLASS_OF_ID = 0x29896f5d

    def __init__(self, pts, final=None, timeout=None):
        """
        :param int pts:
        :param Optional[bool] final:
        :param Optional[int] timeout:

        Constructor for updates.ChannelDifference: Instance of either ChannelDifferenceEmpty, ChannelDifferenceTooLong, ChannelDifference.
        """
        self.pts = pts  # type: int
        self.final = final  # type: Optional[bool]
        self.timeout = timeout  # type: Optional[int]

    def to_dict(self):
        return {
            '_': 'ChannelDifferenceEmpty',
            'pts': self.pts,
            'final': self.final,
            'timeout': self.timeout
        }

    def __bytes__(self):
        return b''.join((
            b'\xfb\xaf\x11>',
            struct.pack('<I', (0 if self.final is None or self.final is False else 1) | (0 if self.timeout is None or self.timeout is False else 2)),
            struct.pack('<i', self.pts),
            b'' if self.timeout is None or self.timeout is False else (struct.pack('<i', self.timeout)),
        ))

    @classmethod
    def from_reader(cls, reader):
        flags = reader.read_int()

        _final = bool(flags & 1)
        _pts = reader.read_int()
        if flags & 2:
            _timeout = reader.read_int()
        else:
            _timeout = None
        return cls(pts=_pts, final=_final, timeout=_timeout)


class ChannelDifferenceTooLong(TLObject):
    CONSTRUCTOR_ID = 0x6a9d7b35
    SUBCLASS_OF_ID = 0x29896f5d

    def __init__(self, pts, top_message, read_inbox_max_id, read_outbox_max_id, unread_count, unread_mentions_count, messages, chats, users, final=None, timeout=None):
        """
        :param int pts:
        :param int top_message:
        :param int read_inbox_max_id:
        :param int read_outbox_max_id:
        :param int unread_count:
        :param int unread_mentions_count:
        :param List[TypeMessage] messages:
        :param List[TypeChat] chats:
        :param List[TypeUser] users:
        :param Optional[bool] final:
        :param Optional[int] timeout:

        Constructor for updates.ChannelDifference: Instance of either ChannelDifferenceEmpty, ChannelDifferenceTooLong, ChannelDifference.
        """
        self.pts = pts  # type: int
        self.top_message = top_message  # type: int
        self.read_inbox_max_id = read_inbox_max_id  # type: int
        self.read_outbox_max_id = read_outbox_max_id  # type: int
        self.unread_count = unread_count  # type: int
        self.unread_mentions_count = unread_mentions_count  # type: int
        self.messages = messages  # type: List[TypeMessage]
        self.chats = chats  # type: List[TypeChat]
        self.users = users  # type: List[TypeUser]
        self.final = final  # type: Optional[bool]
        self.timeout = timeout  # type: Optional[int]

    def to_dict(self):
        return {
            '_': 'ChannelDifferenceTooLong',
            'pts': self.pts,
            'top_message': self.top_message,
            'read_inbox_max_id': self.read_inbox_max_id,
            'read_outbox_max_id': self.read_outbox_max_id,
            'unread_count': self.unread_count,
            'unread_mentions_count': self.unread_mentions_count,
            'messages': [] if self.messages is None else [x.to_dict() if isinstance(x, TLObject) else x for x in self.messages],
            'chats': [] if self.chats is None else [x.to_dict() if isinstance(x, TLObject) else x for x in self.chats],
            'users': [] if self.users is None else [x.to_dict() if isinstance(x, TLObject) else x for x in self.users],
            'final': self.final,
            'timeout': self.timeout
        }

    def __bytes__(self):
        return b''.join((
            b'5{\x9dj',
            struct.pack('<I', (0 if self.final is None or self.final is False else 1) | (0 if self.timeout is None or self.timeout is False else 2)),
            struct.pack('<i', self.pts),
            b'' if self.timeout is None or self.timeout is False else (struct.pack('<i', self.timeout)),
            struct.pack('<i', self.top_message),
            struct.pack('<i', self.read_inbox_max_id),
            struct.pack('<i', self.read_outbox_max_id),
            struct.pack('<i', self.unread_count),
            struct.pack('<i', self.unread_mentions_count),
            b'\x15\xc4\xb5\x1c',struct.pack('<i', len(self.messages)),b''.join(bytes(x) for x in self.messages),
            b'\x15\xc4\xb5\x1c',struct.pack('<i', len(self.chats)),b''.join(bytes(x) for x in self.chats),
            b'\x15\xc4\xb5\x1c',struct.pack('<i', len(self.users)),b''.join(bytes(x) for x in self.users),
        ))

    @classmethod
    def from_reader(cls, reader):
        flags = reader.read_int()

        _final = bool(flags & 1)
        _pts = reader.read_int()
        if flags & 2:
            _timeout = reader.read_int()
        else:
            _timeout = None
        _top_message = reader.read_int()
        _read_inbox_max_id = reader.read_int()
        _read_outbox_max_id = reader.read_int()
        _unread_count = reader.read_int()
        _unread_mentions_count = reader.read_int()
        reader.read_int()
        _messages = []
        for _ in range(reader.read_int()):
            _x = reader.tgread_object()
            _messages.append(_x)

        reader.read_int()
        _chats = []
        for _ in range(reader.read_int()):
            _x = reader.tgread_object()
            _chats.append(_x)

        reader.read_int()
        _users = []
        for _ in range(reader.read_int()):
            _x = reader.tgread_object()
            _users.append(_x)

        return cls(pts=_pts, top_message=_top_message, read_inbox_max_id=_read_inbox_max_id, read_outbox_max_id=_read_outbox_max_id, unread_count=_unread_count, unread_mentions_count=_unread_mentions_count, messages=_messages, chats=_chats, users=_users, final=_final, timeout=_timeout)


class Difference(TLObject):
    CONSTRUCTOR_ID = 0xf49ca0
    SUBCLASS_OF_ID = 0x20482874

    def __init__(self, new_messages, new_encrypted_messages, other_updates, chats, users, state):
        """
        :param List[TypeMessage] new_messages:
        :param List[TypeEncryptedMessage] new_encrypted_messages:
        :param List[TypeUpdate] other_updates:
        :param List[TypeChat] chats:
        :param List[TypeUser] users:
        :param TypeState state:

        Constructor for updates.Difference: Instance of either DifferenceEmpty, Difference, DifferenceSlice, DifferenceTooLong.
        """
        self.new_messages = new_messages  # type: List[TypeMessage]
        self.new_encrypted_messages = new_encrypted_messages  # type: List[TypeEncryptedMessage]
        self.other_updates = other_updates  # type: List[TypeUpdate]
        self.chats = chats  # type: List[TypeChat]
        self.users = users  # type: List[TypeUser]
        self.state = state  # type: TypeState

    def to_dict(self):
        return {
            '_': 'Difference',
            'new_messages': [] if self.new_messages is None else [x.to_dict() if isinstance(x, TLObject) else x for x in self.new_messages],
            'new_encrypted_messages': [] if self.new_encrypted_messages is None else [x.to_dict() if isinstance(x, TLObject) else x for x in self.new_encrypted_messages],
            'other_updates': [] if self.other_updates is None else [x.to_dict() if isinstance(x, TLObject) else x for x in self.other_updates],
            'chats': [] if self.chats is None else [x.to_dict() if isinstance(x, TLObject) else x for x in self.chats],
            'users': [] if self.users is None else [x.to_dict() if isinstance(x, TLObject) else x for x in self.users],
            'state': self.state.to_dict() if isinstance(self.state, TLObject) else self.state
        }

    def __bytes__(self):
        return b''.join((
            b'\xa0\x9c\xf4\x00',
            b'\x15\xc4\xb5\x1c',struct.pack('<i', len(self.new_messages)),b''.join(bytes(x) for x in self.new_messages),
            b'\x15\xc4\xb5\x1c',struct.pack('<i', len(self.new_encrypted_messages)),b''.join(bytes(x) for x in self.new_encrypted_messages),
            b'\x15\xc4\xb5\x1c',struct.pack('<i', len(self.other_updates)),b''.join(bytes(x) for x in self.other_updates),
            b'\x15\xc4\xb5\x1c',struct.pack('<i', len(self.chats)),b''.join(bytes(x) for x in self.chats),
            b'\x15\xc4\xb5\x1c',struct.pack('<i', len(self.users)),b''.join(bytes(x) for x in self.users),
            bytes(self.state),
        ))

    @classmethod
    def from_reader(cls, reader):
        reader.read_int()
        _new_messages = []
        for _ in range(reader.read_int()):
            _x = reader.tgread_object()
            _new_messages.append(_x)

        reader.read_int()
        _new_encrypted_messages = []
        for _ in range(reader.read_int()):
            _x = reader.tgread_object()
            _new_encrypted_messages.append(_x)

        reader.read_int()
        _other_updates = []
        for _ in range(reader.read_int()):
            _x = reader.tgread_object()
            _other_updates.append(_x)

        reader.read_int()
        _chats = []
        for _ in range(reader.read_int()):
            _x = reader.tgread_object()
            _chats.append(_x)

        reader.read_int()
        _users = []
        for _ in range(reader.read_int()):
            _x = reader.tgread_object()
            _users.append(_x)

        _state = reader.tgread_object()
        return cls(new_messages=_new_messages, new_encrypted_messages=_new_encrypted_messages, other_updates=_other_updates, chats=_chats, users=_users, state=_state)


class DifferenceEmpty(TLObject):
    CONSTRUCTOR_ID = 0x5d75a138
    SUBCLASS_OF_ID = 0x20482874

    def __init__(self, date, seq):
        """
        :param Optional[datetime] date:
        :param int seq:

        Constructor for updates.Difference: Instance of either DifferenceEmpty, Difference, DifferenceSlice, DifferenceTooLong.
        """
        self.date = date  # type: Optional[datetime]
        self.seq = seq  # type: int

    def to_dict(self):
        return {
            '_': 'DifferenceEmpty',
            'date': self.date,
            'seq': self.seq
        }

    def __bytes__(self):
        return b''.join((
            b'8\xa1u]',
            self.serialize_datetime(self.date),
            struct.pack('<i', self.seq),
        ))

    @classmethod
    def from_reader(cls, reader):
        _date = reader.tgread_date()
        _seq = reader.read_int()
        return cls(date=_date, seq=_seq)


class DifferenceSlice(TLObject):
    CONSTRUCTOR_ID = 0xa8fb1981
    SUBCLASS_OF_ID = 0x20482874

    def __init__(self, new_messages, new_encrypted_messages, other_updates, chats, users, intermediate_state):
        """
        :param List[TypeMessage] new_messages:
        :param List[TypeEncryptedMessage] new_encrypted_messages:
        :param List[TypeUpdate] other_updates:
        :param List[TypeChat] chats:
        :param List[TypeUser] users:
        :param TypeState intermediate_state:

        Constructor for updates.Difference: Instance of either DifferenceEmpty, Difference, DifferenceSlice, DifferenceTooLong.
        """
        self.new_messages = new_messages  # type: List[TypeMessage]
        self.new_encrypted_messages = new_encrypted_messages  # type: List[TypeEncryptedMessage]
        self.other_updates = other_updates  # type: List[TypeUpdate]
        self.chats = chats  # type: List[TypeChat]
        self.users = users  # type: List[TypeUser]
        self.intermediate_state = intermediate_state  # type: TypeState

    def to_dict(self):
        return {
            '_': 'DifferenceSlice',
            'new_messages': [] if self.new_messages is None else [x.to_dict() if isinstance(x, TLObject) else x for x in self.new_messages],
            'new_encrypted_messages': [] if self.new_encrypted_messages is None else [x.to_dict() if isinstance(x, TLObject) else x for x in self.new_encrypted_messages],
            'other_updates': [] if self.other_updates is None else [x.to_dict() if isinstance(x, TLObject) else x for x in self.other_updates],
            'chats': [] if self.chats is None else [x.to_dict() if isinstance(x, TLObject) else x for x in self.chats],
            'users': [] if self.users is None else [x.to_dict() if isinstance(x, TLObject) else x for x in self.users],
            'intermediate_state': self.intermediate_state.to_dict() if isinstance(self.intermediate_state, TLObject) else self.intermediate_state
        }

    def __bytes__(self):
        return b''.join((
            b'\x81\x19\xfb\xa8',
            b'\x15\xc4\xb5\x1c',struct.pack('<i', len(self.new_messages)),b''.join(bytes(x) for x in self.new_messages),
            b'\x15\xc4\xb5\x1c',struct.pack('<i', len(self.new_encrypted_messages)),b''.join(bytes(x) for x in self.new_encrypted_messages),
            b'\x15\xc4\xb5\x1c',struct.pack('<i', len(self.other_updates)),b''.join(bytes(x) for x in self.other_updates),
            b'\x15\xc4\xb5\x1c',struct.pack('<i', len(self.chats)),b''.join(bytes(x) for x in self.chats),
            b'\x15\xc4\xb5\x1c',struct.pack('<i', len(self.users)),b''.join(bytes(x) for x in self.users),
            bytes(self.intermediate_state),
        ))

    @classmethod
    def from_reader(cls, reader):
        reader.read_int()
        _new_messages = []
        for _ in range(reader.read_int()):
            _x = reader.tgread_object()
            _new_messages.append(_x)

        reader.read_int()
        _new_encrypted_messages = []
        for _ in range(reader.read_int()):
            _x = reader.tgread_object()
            _new_encrypted_messages.append(_x)

        reader.read_int()
        _other_updates = []
        for _ in range(reader.read_int()):
            _x = reader.tgread_object()
            _other_updates.append(_x)

        reader.read_int()
        _chats = []
        for _ in range(reader.read_int()):
            _x = reader.tgread_object()
            _chats.append(_x)

        reader.read_int()
        _users = []
        for _ in range(reader.read_int()):
            _x = reader.tgread_object()
            _users.append(_x)

        _intermediate_state = reader.tgread_object()
        return cls(new_messages=_new_messages, new_encrypted_messages=_new_encrypted_messages, other_updates=_other_updates, chats=_chats, users=_users, intermediate_state=_intermediate_state)


class DifferenceTooLong(TLObject):
    CONSTRUCTOR_ID = 0x4afe8f6d
    SUBCLASS_OF_ID = 0x20482874

    def __init__(self, pts):
        """
        :param int pts:

        Constructor for updates.Difference: Instance of either DifferenceEmpty, Difference, DifferenceSlice, DifferenceTooLong.
        """
        self.pts = pts  # type: int

    def to_dict(self):
        return {
            '_': 'DifferenceTooLong',
            'pts': self.pts
        }

    def __bytes__(self):
        return b''.join((
            b'm\x8f\xfeJ',
            struct.pack('<i', self.pts),
        ))

    @classmethod
    def from_reader(cls, reader):
        _pts = reader.read_int()
        return cls(pts=_pts)


class State(TLObject):
    CONSTRUCTOR_ID = 0xa56c2a3e
    SUBCLASS_OF_ID = 0x23df1a01

    def __init__(self, pts, qts, date, seq, unread_count):
        """
        :param int pts:
        :param int qts:
        :param Optional[datetime] date:
        :param int seq:
        :param int unread_count:

        Constructor for updates.State: Instance of State.
        """
        self.pts = pts  # type: int
        self.qts = qts  # type: int
        self.date = date  # type: Optional[datetime]
        self.seq = seq  # type: int
        self.unread_count = unread_count  # type: int

    def to_dict(self):
        return {
            '_': 'State',
            'pts': self.pts,
            'qts': self.qts,
            'date': self.date,
            'seq': self.seq,
            'unread_count': self.unread_count
        }

    def __bytes__(self):
        return b''.join((
            b'>*l\xa5',
            struct.pack('<i', self.pts),
            struct.pack('<i', self.qts),
            self.serialize_datetime(self.date),
            struct.pack('<i', self.seq),
            struct.pack('<i', self.unread_count),
        ))

    @classmethod
    def from_reader(cls, reader):
        _pts = reader.read_int()
        _qts = reader.read_int()
        _date = reader.tgread_date()
        _seq = reader.read_int()
        _unread_count = reader.read_int()
        return cls(pts=_pts, qts=_qts, date=_date, seq=_seq, unread_count=_unread_count)

