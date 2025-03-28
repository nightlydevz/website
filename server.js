import express from "express";
import axios from "axios";
import path from "path";
import { fileURLToPath } from "url";

const __dirname = path.dirname(fileURLToPath(import.meta.url));

const app = express();
const PORT = 3000;

// Serve the HTML file as a static file
app.get("/dashboard", (_, res) => {
  const filePath = path.join(__dirname, "dashboard.html");
  res.sendFile(filePath);
});
app.get("/locations", (_, res) => {
  const filePath = path.join(__dirname, "locations.html");
  res.sendFile(filePath);
});

// Example API endpoint
app.get("/status", async (_, res) => {
  try {
    const response = await axios.get(
      "https://jsonplaceholder.typicode.com/posts/1"
    );
    res
      .status(200)
      .send(`200 Online`);
  } catch (error) {
    res.status(500).send("Error fetching data");
  }
});

app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});
