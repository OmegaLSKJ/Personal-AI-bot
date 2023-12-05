const  chatInput = document.querySelector(".chat-input textarea");
const sendChatBtn = document.querySelector(".chat-input span");

let userMessage;

const handlechat = () => {
    userMessage = chatInput.Value.trim();
    console.log(userMessage);

}

sendChatBtn.addEventListener("click", handlechat);