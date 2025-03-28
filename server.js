const express = require("express");

const app = express();
const PORT = 3000;

app.get("/check", (req, res) => {
  res.status(200).send("online");
});

app.listen(PORT, () => {
  console.log(`Server is running on http://envn.celinaisd.tech:${PORT}`);
});
