<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog - Submit Your Story</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f9f9f9;
    }
    h1, h2 {
      color: #333;
    }
    form {
      margin-bottom: 20px;
      padding: 15px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
      max-width: 600px;
    }
    label, input, textarea, button {
      display: block;
      width: 100%;
      margin-bottom: 10px;
    }
    input, textarea {
      padding: 8px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    button {
      padding: 10px;
      border: none;
      color: #fff;
      background-color: #4CAF50;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    button:hover {
      background-color: #45a049;
    }
    .story {
      padding: 15px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 15px;
    }
    .story h3 {
      margin-top: 0;
    }
  </style>
</head>
<body>
  <h1>Submit Your Story</h1>
  <form id="storyForm" action="/submit-story" method="POST">
    <label for="author">Name:</label>
    <input type="text" id="author" name="author" required>

    <label for="title">Story Title:</label>
    <input type="text" id="title" name="title" required>

    <label for="content">Your Story:</label>
    <textarea id="content" name="content" rows="5" required></textarea>

    <button type="submit">Submit</button>
  </form>
  
  <h2>Stories from Our Users</h2>
  <div id="storyList"></div>

  <!-- JavaScript to fetch and display stories dynamically -->
  <script>
    async function loadStories() {
      const response = await fetch('/get-stories');
      const stories = await response.json();
      const storyList = document.getElementById('storyList');
      storyList.innerHTML = stories.map(story => `
        <div class="story">
          <h3>${story.title}</h3>
          <p><strong>by ${story.author}</strong></p>
          <p>${story.content}</p>
        </div>
      `).join('');
    }
    loadStories();
  </script>
</body>
</html>