document.addEventListener("DOMContentLoaded", function () {
  const boldButton = document.getElementById("bold");
  const underlineButton = document.getElementById("underline");
  const italicButton = document.getElementById("italic");
  const strikethroughButton = document.getElementById("strikethrough");
  const justifyRightButton = document.getElementById("justifyRight");
  const justifyLeftButton = document.getElementById("justifyLeft");
  const justifyCenterButton = document.getElementById("justifyCenter");
  const justifyFullButton = document.getElementById("justifyFull");
  const unorderedListButton = document.getElementById("unorderedList");
  const increaseFontSizeButton = document.getElementById("increaseFontSize");
  const decreaseFontSizeButton = document.getElementById("decreaseFontSize");
  const copyButton = document.getElementById("copyBtn");
  const resetButton = document.getElementById("resetBtn");
  const colorButton = document.getElementById("color");
  const colorPicker = document.getElementById("color-picker");
  const saveButton = document.getElementById("savebutton");
  const exportButton = document.getElementById("export");
  const text = document.getElementById("text");

  boldButton.addEventListener("click", function () {
    document.execCommand("bold", false, null);
  });

  italicButton.addEventListener("click", function () {
    document.execCommand("italic", false, null);
  });

  underlineButton.addEventListener("click", function () {
    document.execCommand("underline", false, null);
  });

  strikethroughButton.addEventListener("click", function () {
    document.execCommand("strikethrough", false, null);
  });

  justifyRightButton.addEventListener("click", function () {
    document.execCommand("justifyRight", false, null);
  });

  justifyLeftButton.addEventListener("click", function () {
    document.execCommand("justifyLeft", false, null);
  });

  justifyCenterButton.addEventListener("click", function () {
    document.execCommand("justifyCenter", false, null);
  });

  justifyFullButton.addEventListener("click", function () {
    document.execCommand("justifyFull", false, null);
  });

  unorderedListButton.addEventListener("click", function () {
    document.execCommand("insertUnorderedList", false, null);
  });

  increaseFontSizeButton.addEventListener("click", function () {
    const currentSize = parseInt(getComputedStyle(text).fontSize, 10);
    text.style.fontSize = (currentSize + 1) + "px";
  });

  decreaseFontSizeButton.addEventListener("click", function () {
    const currentSize = parseInt(getComputedStyle(text).fontSize, 10);
    text.style.fontSize = (currentSize - 1) + "px";
  });

  copyButton.addEventListener("click", function () {
    const allText = text.innerText;
    if (allText) {
      navigator.clipboard.writeText(allText);
    }
  });

  resetButton.addEventListener("click", function () {
    text.innerHTML = "";
  });

  colorButton.addEventListener("click", function () {
    colorPicker.click();
  });

  colorPicker.addEventListener("input", function () {
    document.execCommand("foreColor", false, colorPicker.value);
  });

  saveButton.addEventListener("click", function () {
    const content = text.innerHTML;

    // Save to local storage
    localStorage.setItem('editorContent', content);

    // Save to database
    fetch('save_content.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'content=' + encodeURIComponent(content)
    })
    .then(response => response.json())
    .then(data => {
      if (data.status === 'success') {
        alert('Content saved successfully.');
      } else {
        alert('Failed to save content: ' + data.message);
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  });

  exportButton.addEventListener("click", function () {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    doc.fromHTML(text.innerHTML, 10, 10, {
      'width': 180
    });

    doc.save('document.pdf');
  });
});
