const express = require("express");
const router = express.Router();
const fs = require("fs");

router.get("/", function (req, res, next) {
  console.log("/ GET 请求");
  fs.readFile(
    __dirname + "/../data/" + "users.json",
    "utf8",
    function (err, data) {
      console.log(JSON.parse(data));
      res.render("users", {
        title: "用户列表页面",
        data: JSON.parse(data),
      });
    }
  );
});

router.post("/signUp", (req, res) => {
  console.log(req.body);
  res.send({ message: "signUp Route", data: req.body });
});
router.post("/signIn", (req, res) => {
  console.log(req.body);
  res.send({ message: "SignIn Route", data: req.body });
});

router.get("/user/:id", (req, res) => {
  console.log(req.params);
  res.send({ message: "User Display Route", data: req.params });
});
router.put("/user", (req, res) => {
  console.log(req.body);
  res.send({ message: "User Update Route", data: req.body });
});
router.delete("/user", (req, res) => {
  console.log(req.body);
  console.log("/del 响应 DELETE 请求");
  res.send({ message: "User Delete Route", data: req.body });
});

router.get("/users/:userId/books/:bookId", (req, res) => {
    // 通过 req.params.userId 访问 userId
    // 通过 req.params.bookId 访问 bookId
    res.send(req.params);
});

module.exports = router;
