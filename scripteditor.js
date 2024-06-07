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
  const insertImageButton = document.getElementById("insertImage");
  const imageInput = document.getElementById("imageInput");
  const text = document.getElementById("text");

  // Load content from local storage if available
  const savedContent = localStorage.getItem('editorContent');
  if (savedContent) {
    text.innerHTML = savedContent;
  }

  // Save content to local storage on every input
  text.addEventListener("input", function () {
    localStorage.setItem('editorContent', text.innerHTML);
  });

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
    localStorage.removeItem('editorContent');
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
    const pdf = new jsPDF('p', 'mm', 'a4');
    
    pdf.html(text, {
      callback: function (pdf) {
        pdf.save('document.pdf');
      },
      x: 10,
      y: 10,
      width: 180, // Target width in units
      windowWidth: 900 // Window width in CSS pixels
    });
  });

  insertImageButton.addEventListener("click", function () {
    imageInput.click();
  });

  imageInput.addEventListener("change", function () {
    const file = imageInput.files[0];
    const reader = new FileReader();

    reader.onload = function (event) {
      const img = document.createElement("img");
      img.src = event.target.result;
      img.style.width = "200px";
      img.style.height = "200px";
      img.style.cursor = "pointer";
      img.addEventListener("click", function () {
        const newSize = prompt("Enter new width in pixels (e.g., 200 for 200px width):", img.style.width.replace("px", ""));
        if (newSize) {
          img.style.width = newSize + "px";
          img.style.height = "auto"; // maintain aspect ratio
        }
      });
      text.appendChild(img);
    };

    if (file) {
      reader.readAsDataURL(file);
    }
  });

  // Warn user before leaving the page
  window.addEventListener("beforeunload", function (event) {
    event.preventDefault();
    event.returnValue = '';
  });
});
