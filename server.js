import express from "express";
import axios from "axios";

const app = express();
const PORT = 3000;

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
