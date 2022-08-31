import React, { useState } from 'react';
import { ChatEngine, getOrCreateChat } from 'react-chat-engine';
import axios from 'axios';

const MooseChat = (props) => {
  const [username, setUsername] = useState('');
  // const [secret, setSecret] = useState('pass');

  const createUser = (user) => {
    // put IS FOR GET OR CREATE ACCORDING TO DOC
    axios
      .put('https://api.chatengine.io/users/', user, {
        headers: { 'Private-Key': '37d9cc64-75a2-41e0-94d9-61a0c9c29750' },
      })
      .then((r) => console.log('get or create user', r))
      .catch((e) => console.log('get or create error', e));
  };

  function createDirectChat(creds) {
    const user = {
      username: username,
      secret: 'pass1234',
      // first_name: 'Adam',
      // last_name: 'La Morre',
      // custom_json: { high_score: 2000 },
    };
    createUser(user);

    getOrCreateChat(
      creds,
      { is_direct_chat: true, usernames: [username] },
      () => setUsername('')
    );
    // getOrCreateChat(creds, { is_direct_chat: true, usernames: ['Rico'] }, () =>
    //   setUsername('')
    // );
  }

  function renderChatForm(creds) {
    return (
      <div>
        <input
          placeholder="Username"
          value={username}
          onChange={(e) => setUsername(e.target.value)}
        />
        <button onClick={() => createDirectChat(creds)}>Create</button>
      </div>
    );
  }

  return (
    <ChatEngine
      height="60vh"
      projectID="98d9a7a2-3755-4354-a63f-a9165641e131"
      userName="moose"
      userSecret="pass"
      // renderNewChatForm={(creds) => createDirectChat(creds)} // This is for starting DM on page load
      renderNewChatForm={(creds) => renderChatForm(creds)} // This is for DM from the Chat page
    />
  );
};

export default MooseChat;
