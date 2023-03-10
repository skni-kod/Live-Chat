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


document.getElementById('submit-button').addEventListener('click', function() {
    var color = document.querySelector('#livechat-preset-colors input[type="color"]').value;
    var form = document.getElementById('livechat-settings-form');
    var formData = new FormData(form);

    formData.set('color', color);

    var selectedOption = document.getElementById('selected_option').value;
    formData.set('livechat-position-selector', selectedOption);

    var xhr = new XMLHttpRequest();
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
});
