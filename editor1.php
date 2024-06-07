<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>One-Place Docs</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="editor.css">
  <!-- daisy UI -->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  
  <style>
    .sidemargin {
      margin: 0 80px;
      margin-top: 10px;
    }
    .logo {
      font-size: 25px;
    }
    .logout {
      font-size: 16px;
      border: 1px solid red;
      margin-right: 5px;
    }
    .share {
      font-size: 16px;
      border: 1px solid green;
    }
    .navbar-end {
      display: flex;
      gap: 10px;
    }
    .color-picker {
      display: none;
    }
  </style>
</head>
<body>
  <!-- navbar -->
  <!-- <div class="sidemargin">
    <div class="navbar bg-base-100">
      <div class="navbar-start">
        <div class="dropdown">
          <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
            </svg>
          </div>
        </div>
        <a class="btn btn-ghost text-xl"><span class="logo">One-Place Docs</span></a>
      </div>
      <div class="navbar-center hidden lg:flex"></div>
      <div class="navbar-end">
        <a class="btn share" href="sharemodal.php">Share</a>
        <a class="btn logout" href="logout.php">Logout</a>
      </div>
    </div>
  </div> -->
  <!-- navbar end -->

  <!-- <main class="container">
    <div class="tools-area">
      <div class="tooltip" data-tip="Bold">
        <button id="bold" class="tools-btn"><i class="fa-solid fa-bold"></i></button>
      </div>
      <div class="tooltip" data-tip="Italic">
        <button id="italic" class="tools-btn"><i class="fa-solid fa-italic"></i></button>
      </div>
      <div class="tooltip" data-tip="Underline">
        <button id="underline" class="tools-btn"><i class="fa-solid fa-underline"></i></button>
      </div>
      <div class="tooltip" data-tip="Color">
        <button id="color" class="tools-btn"><i class="fa-solid fa-font"></i></button>
        <input type="color" id="color-picker" class="color-picker">
      </div>
      <div class="tooltip" data-tip="Font">
        <button id="font-name" class="tools-btn">
          <div class="dropdown">
            <div tabindex="0" role="button" class="btn-sm m-1">Font</div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow rounded-box w-52">
              <li><a>English</a></li>
              <li><a>Bangla</a></li>
            </ul>
          </div>
        </button>
      </div>
      <div class="tooltip" data-tip="Insert Link">
        <button id="insert-link" class="tools-btn"><i class="fa-solid fa-link"></i></button>
      </div>
      <div class="tooltip" data-tip="Strikethrough">
        <button id="strikethrough" class="tools-btn"><i class="fa-solid fa-strikethrough"></i></button>
      </div>
      <div class="tooltip" data-tip="Align Left">
        <button id="justifyLeft" class="tools-btn"><i class="fa-solid fa-align-left"></i></button>
      </div>
      <div class="tooltip" data-tip="Align Right">
        <button id="justifyRight" class="tools-btn"><i class="fa-solid fa-align-right"></i></button>
      </div>
      <div class="tooltip" data-tip="Justify Full">
        <button id="justifyFull" class="tools-btn"><i class="fa-solid fa-align-justify"></i></button>
      </div>
      <div class="tooltip" data-tip="Align Center">
        <button id="justifyCenter" class="tools-btn"><i class="fa-solid fa-align-center"></i></button>
      </div>
      <div class="tooltip" data-tip="Unordered List">
        <button id="unorderedList" class="tools-btn"><i class="fa-solid fa-list-ul"></i></button>
      </div>
      <div class="tooltip" data-tip="Increase Font Size">
        <button id="increaseFontSize" class="tools-btn"><i class="fa-solid fa-plus"></i></button>
      </div>
      <div class="tooltip" data-tip="Decrease Font Size">
        <button id="decreaseFontSize" class="tools-btn"><i class="fa-solid fa-minus"></i></button>
      </div>
      <div class="tooltip" data-tip="Insert Image">
        <button id="insertImage" class="tools-btn"><i class="fa-solid fa-image"></i></button>
        <input type="file" id="imageInput" style="display:none;" accept="image/*">
      </div>
      <div class="tooltip" data-tip="Copy">
        <button id="copyBtn" class="tools-btn"><i class="fa-regular fa-clipboard"></i></button>
      </div>
      <div class="tooltip" data-tip="Reset">
        <button id="resetBtn" class="tools-btn"><i class="fa-solid fa-rotate-right"></i></button>
      </div>
      <div class="tooltip" data-tip="Save">
        <button id="savebutton" class="tools-btn">Save</button>
      </div>
      <div class="tooltip" data-tip="Export">
        <button id="export" class="tools-btn">Export</button>
      </div>
    </div>
    <div class="txt-area">
        <div contentEditable="true" class="text" id="text" placeholder="start typing your text to play with..." rows="20"></div>
        <div style="text-align: center; margin-top: 10px;"></div>
    </div>
  </main> -->

  <div>
    <button id="bold">Bold</button>
    <button id="underline">Underline</button>
    <button id="italic">Italic</button>
    <button id="strikethrough">Strikethrough</button>
    <button id="justifyRight">Justify Right</button>
    <button id="justifyLeft">Justify Left</button>
    <button id="justifyCenter">Justify Center</button>
    <button id="justifyFull">Justify Full</button>
    <button id="unorderedList">Unordered List</button>
    <button id="increaseFontSize">Increase Font Size</button>
    <button id="decreaseFontSize">Decrease Font Size</button>
    <button id="copyBtn">Copy</button>
    <button id="resetBtn">Reset</button>
    <button id="color">Text Color</button>
    <input type="color" id="color-picker" style="display:none;">
    <button id="savebutton">Save</button>
    <button id="export">Export PDF</button>
    <button id="insertImage">Insert Image</button>
    <input type="file" id="imageInput" style="display:none;" accept="image/*">
  </div>
  <div id="text" contenteditable="true" style="border:1px solid black; padding:10px; width:80%; height:300px; margin-top:20px;">
    Your text here...
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
  <script src="scripteditor.js"></script>

</body>
</html>
