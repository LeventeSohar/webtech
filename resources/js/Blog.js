const express = require('express');
const bodyParser = require('body-parser');
const sqlite3 = require('sqlite3').verbose();

const app = express();
const db = new sqlite3.Database(':memory:'); // Use ':memory:' for in-memory or 'blog.db' for persistent storage

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// Initialize Database
db.serialize(() => {
  db.run("CREATE TABLE IF NOT EXISTS stories (id INTEGER PRIMARY KEY, author TEXT, title TEXT, content TEXT)");
});

// Handle story submission
app.post('/submit-story', (req, res) => {
  const { author, title, content } = req.body;
  db.run("INSERT INTO stories (author, title, content) VALUES (?, ?, ?)", [author, title, content], (err) => {
    if (err) return res.status(500).send("Error saving story");
    res.redirect('/'); // Redirect to blog page after submission
  });
});

// Retrieve stories for display
app.get('/get-stories', (req, res) => {
  db.all("SELECT author, title, content FROM stories", (err, rows) => {
    if (err) return res.status(500).send("Error fetching stories");
    res.json(rows);
  });
});

// Serve the blog HTML page



app.get('/', (req, res) => {
  res.sendFile(__dirname + '/path/to/blog-page.html'); // Adjust this path to your actual HTML file location
});

app.listen(3000, () => console.log('Server is running on http://localhost:3000'));
