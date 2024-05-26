<?php include 'sidebar_admin.php'; ?>
    <div class="container">
      <main class="main-content">
        <header>
          <h1>My Account</h1>
          <div class="nav-right">
            <a href="./home_admin.php">Home</a>
            <a href="./categories_admin.php">Categories</a>
            <div class="user-profile">
              <img src="./image/user-picture/<?php echo $user_info[0]['photo']; ?>" alt="User Profile" />
            </div>
          </div>
        </header>
        <section>
        <div class="user-info">
            <form action="">
                <div class="form-input">
                    <img src="./image/user-picture/user2.jpg" alt="User Picture" class="user-picture">
                    <div class="user-form">
                        <label for="name">Name:</label>
                        <input type="text" id="name" value="Adriano Posumah">
                        <label for="role">Role:</label>
                        <input type="text" id="role" value="Admin">
                    </div>
                </div>
                    <div class="form-submit">         
                        <button type="submit">Save</button>
                    </div>
                </form>
            </div>
        </section>
      </main>
    </div>
    <script>

    </script>

    </html>