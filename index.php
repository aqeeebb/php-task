<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Management</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="container-card">
      <h1 class="heading-text">Task Management</h1>
      <button class="open-modal-btn">Add Task</button>

      <!-- Add/Edit Task Modal -->
      <div id="taskModal" class="modal">
        <div class="modal-content">
          <span class="close-btn">&times;</span>
          <form id="taskForm" method="POST">
            <input type="hidden" id="task-id" name="id">
            <label for="title">Task Title:</label>
            <input type="text" id="title" name="title" placeholder="Title..." required>
            <label for="description">Task Description:</label>
            <textarea id="description" name="description" placeholder="Description..." required></textarea>
            <button class="add-task-btn" type="submit">Save Task</button>
          </form>
        </div>
      </div>

      <!-- Tasks list -->
      <h1 class="subheading-text">Task List</h1>
      <ul>
        <li class="task-header">
          <div class="task-header-id">ID</div>
          <div class="task-header-title">Title</div>
          <div class="task-header-description">Description</div>
          <div class="task-header-action">Action</div>
        </li>
        <?php
        // Include database connection
        include 'db_connect.php';
        // Fetch tasks from the database
        $result = $conn->query("SELECT * FROM tasks");
        if ($result->num_rows > 0) {
            // Output tasks
            while ($row = $result->fetch_assoc()) {
                echo "
                <li class='task-item'>
                  <div class='task-id'>{$row['id']}</div>
                  <div class='task-title'>{$row['title']}</div>
                  <div class='task-description'>{$row['description']}</div>
                  <div class='task-controls'>
                    <a href='#' onclick='openEditModal({$row['id']}, \"{$row['title']}\", \"{$row['description']}\")'>Edit</a>
                    <a href='delete_task.php?id={$row['id']}' onclick='return confirmDelete(event)'>Delete</a>
                  </div>
                </li>
              ";
            }
        } else {
            echo "
            <div>
            No tasks found <br>
            <img src='./images/no-items.svg' class='no-items-img' alt='No items'>
            </div>
            ";
        }
        $conn->close();
        ?>
      </ul>
    </div>
  </div>

  <script>

    // Get the modal
    var taskModal = document.getElementById("taskModal");

    // Get the button that opens the modal
    var openModalBtn = document.querySelector(".open-modal-btn");

    // Get the <span> element that closes the modal
    var closeBtn = document.querySelector(".close-btn");

    // When the user clicks the button, open the modal for adding task
    openModalBtn.onclick = function() {
        document.getElementById('taskForm').reset(); // reset the form
        document.getElementById('taskForm').action = 'add_task.php'; // set the action to add_task.php
        document.getElementById('task-id').value = ''; // clear the hidden id field
        taskModal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    closeBtn.onclick = function() {
        taskModal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == taskModal) {
            taskModal.style.display = "none";
        }
    }

    // Function to open the modal for editing a task
    function openEditModal(id, title, description) {
        document.getElementById('taskForm').reset(); // reset the form
        document.getElementById('taskForm').action = 'edit_task.php'; // set the action to edit_task.php
        document.getElementById('task-id').value = id; // set the hidden id field
        document.getElementById('title').value = title; // set the title field
        document.getElementById('description').value = description; // set the description field
        taskModal.style.display = "block";
    }

    // Function to confirm delete action
    function confirmDelete(event) {
        if (!confirm('Are you sure you want to delete this task?')) {
            event.preventDefault();
            return false;
        }
        return true;
    }
  </script>
</body>
</html>
