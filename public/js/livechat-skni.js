function livechat_updateHeader(color)
{
    const livechatHeader = document.querySelector('.livechat-header');
    const livechatSendButton = document.querySelector(('#livechat-send-button'))

    document.getElementById("livechat-color-picker").value = color;

    livechatHeader.style.backgroundColor = color;
    livechatSendButton.style.backgroundColor = color;

}

function livechat_updateHeaderCostum()
{
    const livechatHeader = document.querySelector('.livechat-header');
    const livechatSendButton = document.querySelector(('#livechat-send-button'))
    const color = document.getElementById("livechat-color-picker").value ;
    livechatHeader.style.backgroundColor = color;
    livechatSendButton.style.backgroundColor = color;

}

function setChatPosition(position) {
    const selectedOptionInput = document.getElementById('selected_option');
    selectedOptionInput.value = position;
}

function livechatToggleChat() {
    let expandButton = document.getElementById('livechat-expand-btn');
    let chatContainer = document.querySelector('.livechat-container');

    chatContainer.classList.toggle('expanded');

    let closeButton = document.getElementById('livechat-close-btn');

    closeButton.addEventListener('click', () => {
        chatContainer.classList.remove('expanded');
    });
}


function livechatSavePreferences(){
        let color = document.querySelector('#livechat-preset-colors input[type="color"]').value;
        let form = document.getElementById('livechat-settings-form');
        let formData = new FormData(form);

        formData.set('color', color);

        let selectedOption = document.getElementById('selected_option').value;
        formData.set('livechat-position-selector', selectedOption);

        let xhr = new XMLHttpRequest();
        xhr.open(form.method, form.action, true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                alert('Settings saved successfully.');
            } else {
                alert('There was an error while saving the settings.');
            }
        };
        xhr.send(formData);

        return false;
}
