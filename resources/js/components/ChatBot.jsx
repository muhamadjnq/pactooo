import React, { useState } from "react";
import axios from "axios";

const ChatBot = () => {
    const [message, setMessage] = useState("");
    const [responses, setResponses] = useState([]);

    const sendMessage = async () => {
        try {
            const response = await axios.post("/api/chat", { message });
            setResponses([...responses, { user: message, bot: response.data }]);
            setMessage("");
        } catch (error) {
            console.error("Error sending message:", error);
        }
    };

    return (
        <div>
            <div>
                {responses.map((res, index) => (
                    <div key={index}>
                        <p><strong>You:</strong> {res.user}</p>
                        <p><strong>Bot:</strong> {res.bot.message}</p>
                    </div>
                ))}
            </div>
            <input
                type="text"
                value={message}
                onChange={(e) => setMessage(e.target.value)}
                placeholder="Type your message..."
            />
            <button onClick={sendMessage}>Send</button>
        </div>
    );
};

export default ChatBot;
