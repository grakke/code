const mongoose = require("mongoose");

const mongoDB =
    "mongodb+srv://henry_2024:Atlas_20240925&@cluster0.bbn8x.mongodb.net/";
mongoose.connect(mongoDB);
mongoose.Promise = global.Promise;
const db = mongoose.connection;

db.on("error", console.error.bind(console, "MongoDB 连接错误："));

var Schema = mongoose.Schema;
var SomeModelSchema = new Schema({
    name: String,
    binary: Buffer,
    living: Boolean,
    updated: { type: Date, default: Date.now },
    age: { type: Number, min: 18, max: 65, required: true },
    mixed: Schema.Types.Mixed,
    _someId: Schema.Types.ObjectId,
    array: [],
    ofString: [String],
    nested: { stuff: { type: String, lowercase: true, trim: true } },
});
const SomeModel = mongoose.model("SomeModel", SomeModelSchema);

const awesome_instance = new SomeModel({ name: "牛人" });

awesome_instance.name = "酷毙了的牛人";
awesome_instance.save(function (err) {
    if (err) {
        return handleError(err);
    }
});

SomeModel.create({ name: "也是牛人" }, function (err, awesome_instance) {
    if (err) {
        return handleError(err);
    }
});

const Athlete = mongoose.model("Athlete", yourSchema);

// SELECT name, age FROM Athlete WHERE sport='Tennis'
Athlete.find({ sport: "Tennis" }, "name age", function (err, athletes) {
    if (err) {
        return handleError(err);
    } // 'athletes' 中保存一个符合条件的运动员的列表
});

const query = Athlete.find({ sport: "Tennis" });

// 查找 name, age 两个字段
query.select("name age");

// 只查找前 5 条记录
query.limit(5);

// 按年龄排序
query.sort({ age: -1 });

// 以后某个时间运行该查询
query.exec(function (err, athletes) {
    if (err) {
        return handleError(err);
    } // athletes 中保存网球运动员列表，按年龄排序，共 5 条记录
});

Athlete.find()
    .where("sport")
    .equals("Tennis")
    .where("age")
    .gt(17)
    .lt(50) // 附加 WHERE 查询
    .limit(5)
    .sort({ age: -1 })
    .select("name age")
    .exec(callback); // 回调函数的名字是 callback
