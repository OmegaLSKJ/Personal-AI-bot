const chatInput = document.querySelector("#chat-input");
const sendButton = document.querySelector("#send-btn");
const chatContainer = document.querySelector(".chat-container");

let userText = null;
const API_KEY ="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";

const createElement = (html, className) => {
    const chatDiv = document.createElement("div");
    chatDiv.classList.add("chat", className);
    chatDiv.innerHTML = html;
    return chatDiv;
}

const getChatResponse = async (incomingChatDiv) => {
    const API_URL = "	https://api.openai.com/v1/chat/completions";
    const pElement = document.createElement("p");

    const requestOptions = {
        method : "POST",
        Headers:{
        "Content-Type":"application/json",
        "Authorization" : `Bearer $[API_KEY]`,
        },
        body: JSON.stringify({
            model: "gpt-3.5-turbo",
            prompt: userText,
            max_tokens: 2048,
            temperature: 0.2,
            n: 1,
            stop: null

        })
    }

    try{
        const response = await (await fetch(API_URL, requestOptions)).json();
        pElement.textContent = response.choices[0].text.content;
    }catch(error) {
        console.log(error);
    }

    incomingChatDiv.querySelector(".typing-animation").remove();
    incomingChatDiv.querySelector(".chat-details").appendChild(pElement);
}

const copyResponse = (copyBtn) => {
    const responseTextElement = copyBtn.parentElement.querySelector("p");
    navigator.clipboard.writeText(responseTextElement.textContent);
    copyBtn.textContent = 'done';
    setTimeout(() => copyBtn.textContent = "content_copy", 1000);
}

const showTypingAnimation  = () => {
    const html = `<div class="chat-content">
                     <div class="chat-details">
                        <img src="chat gpt.png" alt="user-img">
                        <div class="typing-animation">
                             <div class="typing-dot" style="--delay: 0.2s"></div>
                             <div class="typing-dot" style="--delay: 0.3s"></div>
                             <div class="typing-dot" style="--delay: 0.4s"></div>
                        </div>
                    </div>
                    <span onclick="copyResponse()" class="material-symbols-outlined">content_copy</span>
                </div>`;

    const incomingChatDiv = createElement(html, "incoming");
    chatContainer.appendChild(incomingChatDiv);
    getChatResponse(incomingChatDiv);
}

const handleOutgoingChat = () => {
    userText = chatInput.value.trim();
    const html = `<div class="chat-content">
                     <div class="chat-details">
                        <img src="dog.jpeg" alt="user-img">
                            <p>${userText}</p>
                     </div>
                  </div>`;
    const outgoingChatDiv = createElement(html, "outgoing");
    outgoingChatDiv.querySelector("p").textContent = userText;
    chatContainer.appendChild(outgoingChatDiv);
    setTimeout(showTypingAnimation, 500);

}

sendButton.addEventListener("click", handleOutgoingChat);

