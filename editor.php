<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Text Editor</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmF/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  
  <style>
    /* Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap');

    * {
        font-family: 'Poppins';
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        scroll-behavior: smooth;
        scroll-padding-top: 2rem;
    }

    body {
        color: #0e2045;
        background: #fff;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    main {
        flex: 1;
        position: absolute;
        top: 50%; 
        left: 50%; 
        transform: translate(-50%, -50%); 
    }

    img {
        width: 100%;
    }

    section {
        padding: 3rem 0 2rem;
    }

    a {
        text-decoration: none;
        color: #0e2045;
    }

    .container {
        max-width: 1200px;
        margin: auto;
        width: 100%;
    }

    .btn {
        background-color: #eaeaea;
        border: none;
        padding: 8px 20px;
        border-radius: 50px;
        cursor: pointer;
    }

    .btn:hover {
        box-shadow: 0 5px 30px 0 rgba(0, 0, 0, .05);
        transition: .3s ease;
    }

    .btn:active {
        scale: 95%;
    }

    .tools-btn {
        background-color: #fff;
        border: none;
        padding: 8px 20px;
        border-radius: 6px;
        cursor: pointer;
        margin: 2px;
    }

    .tools-btn:hover {
        background-color: #eaeaea;
    }

    .tools-btn:active:hover {
        background-color: #e1e0e0;
    }

    .tools-area {
        background-color: #f8f9fa;
        width: 100%;
        padding: 20px;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        text-align: center;
        margin-top: 20px;
    }

    #text {
        width: 210mm;
        height: 297mm;
        resize: none;
        border-bottom-left-radius: 8px;
        border-bottom-right-radius: 8px;
        border: 3px solid #eaeaea;
        border-top-color: #f8f9fa;
        background-color: #fff;
        outline: none;
        padding: 10px 12px;
        margin: 20px auto;
        box-shadow: 0 5px 30px 0 rgba(0, 0, 0, .1);
        font-size: 16px;
        padding-left: 96px;
        padding-top: 80px;
      }

    .ashish-credits {
        background-color: #fff;
        border: 2px solid #e7e9eb;
        font-size: smaller;
        padding: .5rem .5rem;
        width: 200px;
        display: flex;
        column-gap: .3rem;
        justify-content: center;
        border-radius: 50px;
        box-shadow: 0 5px 30px 0 rgba(0, 0, 0, .05);
        z-index: 9999;
        position: fixed;
        bottom: 1rem;
        right: 1rem;
    }

    .ashish-credits .icon {
        color: #8710d8
    }

    @media (max-width: 1000px) {
        .container {
            margin: 0 auto;
            width: 90%;
        }

        #text {
            width: 100%;
            height: auto;
        }
    }
    .dropbtn {
  background-color: #fff;
  color: black;
  padding: 14px;
  font-size: 14px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #fff;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #fff;}
  </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
</head>
<body>
  <div class="tools-area">
    <button id="bold" class="tools-btn">Bold</button>
    <button id="underline" class="tools-btn">Underline</button>
    <button id="italic" class="tools-btn">Italic</button>
    <button id="color" class="tools-btn">Text Color</button>
    <input type="color" id="color-picker" style="display:none;">
    <div class="dropdown">
  <button class="dropbtn tools-btn">Front</button>
  <div class="dropdown-content">
    <a href="#">English</a>
    <a href="#">Bangla</a>
  </div>
</div>
    <button id="strikethrough" class="tools-btn">Strikethrough</button>
    <button id="justifyRight" class="tools-btn">Justify Right</button>
    <button id="justifyLeft" class="tools-btn">Justify Left</button>
    <button id="justifyCenter" class="tools-btn">Justify Center</button>
    <button id="justifyFull" class="tools-btn">Justify Full</button>
    <button id="unorderedList" class="tools-btn">Unordered List</button>
    <button id="increaseFontSize" class="tools-btn">Increase Font Size</button>
    <button id="decreaseFontSize" class="tools-btn">Decrease Font Size</button>
    <button id="insertImage" class="tools-btn">Insert Image</button>
    <input type="file" id="imageInput" style="display:none;" accept="image/*">
    <button id="copyBtn" class="tools-btn">Copy</button>
    <button id="resetBtn" class="tools-btn">Reset</button>
    <button id="savebutton" class="tools-btn">Save</button>
    <button id="export" class="tools-btn">Export</button>
    <button class="tools-btn"><a class="tools-btn" href="sharemodal.php">Share</a></button>
    <button class="tools-btn"><a class="tools-btn" href="logout.php">Logout</a></button>
  </div>
  <div id="text" contenteditable="true"></div>
  <script src="scripteditor.js"></script>
</body>
</html>
