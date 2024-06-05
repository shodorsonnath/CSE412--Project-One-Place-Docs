<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share</title>
    <link rel="stylesheet" href="share.css">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <style>
        #email-text {
            padding: 10px;
            margin-bottom: 10px;
            width: 100%;
        }
        .popup-box textarea {
            min-height: 100px;
        }
    </style>
</head>
<body>
    <section>
        <div class="profile">
            <div class="profile-img">
                <img src="share-profile.png" alt="">
            </div>
            <span class="name">New Document</span>
            <span class="profession">A docs from One-Place Docs</span>
            <div id="hireBtn" class="button">
                <i class="bx bxs-envelope"></i>
                <button>Share File</button>
            </div>
        </div>

        <!-- popup box start -->
        <div class="popup-outer">
            <div class="popup-box">
                <i id="close" class="bx bx-x close"></i>
                <form id="shareForm" action="mail_system.php" method="post">
                    <input type="email" name="email" id="email-text" placeholder="Write Your Email Here" required>
                    <textarea name="message" spellcheck="false" placeholder="Enter your message" required></textarea>
                    <input type="hidden" name="subject" value="Share Document From One-Place Docs">
                    <div class="button">
                        <button type="button" id="cancel" class="cancel">Cancel</button>
                        <button type="submit" class="send">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        const section = document.querySelector("section"),
        hireBtn = section.querySelector("#hireBtn"),
        closeBtn = section.querySelectorAll("#close, #cancel"),
        textArea = section.querySelector("textarea");

        hireBtn.addEventListener("click", () => {
            section.classList.add("show");
        });

        closeBtn.forEach(cBtn => {
            cBtn.addEventListener("click", () => {
                section.classList.remove("show");
                textArea.value = "";
            });
        });

        // Handle form submission
        document.getElementById("shareForm").addEventListener("submit", function(event) {
            event.preventDefault();
            const formData = new FormData(this);

            fetch(this.action, {
                method: this.method,
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert("Document shared successfully");
                section.classList.remove("show");
                this.reset();
            })
            .catch(error => {
                console.error("Error:", error);
            });
        });
    </script>
</body>
</html>
