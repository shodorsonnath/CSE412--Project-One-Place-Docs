<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Modal</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <style>
    /* Google Fonts - Poppins */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }
    section {
      position: fixed;
      height: 100%;
      width: 100%;
      background: #e3f2fd;
    }
    button {
      font-size: 18px;
      font-weight: 400;
      color: #fff;
      padding: 14px 22px;
      border: none;
      background: #4070f4;
      border-radius: 6px;
      cursor: pointer;
    }
    button:hover {
      background-color: #265df2;
    }
    button.show-modal,
    .modal-box {
      position: fixed;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
    section.active .show-modal {
      display: none;
    }
    .overlay {
      position: fixed;
      height: 100%;
      width: 100%;
      background: rgba(0, 0, 0, 0.3);
      opacity: 0;
      pointer-events: none;
    }
    section.active .overlay {
      opacity: 1;
      pointer-events: auto;
    }
    .modal-box {
      display: flex;
      flex-direction: column;
      align-items: center;
      max-width: 380px;
      width: 100%;
      padding: 30px 20px;
      border-radius: 24px;
      background-color: #fff;
      opacity: 0;
      pointer-events: none;
      transition: all 0.3s ease;
      transform: translate(-50%, -50%) scale(1.2);
    }
    section.active .modal-box {
      opacity: 1;
      pointer-events: auto;
      transform: translate(-50%, -50%) scale(1);
    }
    .modal-box i {
      font-size: 70px;
      color: #4070f4;
    }
    .modal-box h2 {
      font-size: 24px;
      font-weight: 600;
      margin: 10px 0 15px 0;
    }
    .modal-box p {
      font-size: 16px;
      color: #333;
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <section id="modal-section">
    <button class="show-modal">Show Modal</button>
    <div class="overlay"></div>
    <div class="modal-box">
      <i class="fa-solid fa-circle-check"></i>
      <h2>Error!! Please Try Again</h2>
      <a href="register.php"><button class="close-modal">Back</button></a>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const modalSection = document.getElementById('modal-section');
      const showModalBtn = document.querySelector('.show-modal');
      const closeModalBtn = document.querySelector('.close-modal');
      const overlay = document.querySelector('.overlay');

      const showModal = () => {
        modalSection.classList.add('active');
      };

      const closeModal = () => {
        modalSection.classList.remove('active');
      };

      showModalBtn.addEventListener('click', showModal);
      closeModalBtn.addEventListener('click', closeModal);
      overlay.addEventListener('click', closeModal);

      <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
      showModal();
      <?php endif; ?>
    });
  </script>
</body>
</html>
