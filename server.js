import express from "express";
import axios from "axios";
import path from "path";

const app = express();
const PORT = 3000;

// Serve the PHP file as a static file
app.get("/dashboard", (_, res) => {
  const filePath = path.join(__dirname, "public", "dashboard.php");
  res.sendFile(filePath);
});

app.get("/check", async (_, res) => {
  try {
    const response = await axios.get(
      "https://jsonplaceholder.typicode.com/posts/1"
    );
    res
      .status(200)
      .send(`Server is online. Sample data: ${response.data.title}`);
  } catch (error) {
    res.status(500).send("Error fetching data");
  }
});

app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});
