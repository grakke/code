const MongoClient = require("mongodb").MongoClient;
const assert = require("assert");

// Connection URL
const url = "mongodb://localhost:27017";

// Database Name
const dbName = "test";

// Use connect method to connect to the server
MongoClient.connect(url, function (err, client) {
    assert.equal(null, err);
    console.log("Connected successfully to server");

    const db = client.db(dbName);

    // create collection
    db.createCollection("site", function (err, client) {
        assert.equal(null, err);
        console.log("Create collection success");
        // client.close();
    });

    const item = {
        name: "henry",
        age: "45",
    };
    db.collection("site").insertOne(item, function (err, res) {
        assert.equal(null, err);
        console.log("Collection insert item success");
        client.close();
    });

    const items = [
        {
            name: "Google",
            country: "US",
        },
        {
            name: "Apple",
            country: "US",
        },
        {
            name: "Alibaba",
            country: "CN",
        },
    ];
    db.collection("site").insertMany(items, function (err, res) {
        assert.equal(null, err);
        console.log("Collection insert items count:" + res.insertedCount);
        client.close();
    });

    // find sort limit skip
    db.collection("site")
        .find({})
        .sort({
            name: -1,
        })
        .skip(4)
        .limit(2)
        .toArray(function (err, res) {
            assert.equal(null, err);
            console.log(res);
            client.close();
        });

    // find by condition
    var where = {
        name: "Google",
    };
    db.collection("site")
        .find(where)
        .toArray(function (err, res) {
            assert.equal(null, err);
            console.log(res);
            client.close();
        });

    // update one item by condition
    const where = {
        name: "Google",
    };
    var updateData = {
        $set: {
            country: "USA",
        },
    };
    db.collection("site").updateOne(where, updateData, function (err, res) {
        assert.equal(null, err);
        console.log("Update success");
        client.close();
    });

    // update items by condition
    const where = {
        country: "U.S",
    };
    const updateData = {
        $set: {
            country: "US",
        },
    };
    db.collection("site").updateMany(where, updateData, function (err, res) {
        assert.equal(null, err);
        console.log(res.result.nModified + " items update");
        client.close();
    });

    // delete item
    const where = {
        name: "Google",
    };
    db.collection("site").deleteOne(where, function (err, res) {
        assert.equal(null, err);
        console.log("Delete one item");

        client.close();
    });

    // delete items
    const where = {
        country: "CN",
    };
    db.collection("site").deleteMany(where, function (err, res) {
        assert.equal(null, err);
        console.log(res.result.n + " item deleted");
        client.close();
    });

    // 左连接
    db.createCollection("products", function (err, client) {
        assert.equal(null, err);
        console.log("Create collection success");

        db.collection("products").insertMany(
            [
                {
                    _id: 154,
                    name: "笔记本电脑",
                },
                {
                    _id: 155,
                    name: "耳机",
                },
                {
                    _id: 156,
                    name: "台式电脑",
                },
            ],
            function (err, res) {
                assert.equal(null, err);
                console.log(res.result.n + " items insert");
                // client.close();
            }
        );
    });

    db.createCollection("orders", function (err, res) {
        assert.equal(null, err);
        console.log("Create collection success");

        db.collection("orders").insertMany(
            [
                {
                    _id: 1,
                    product_id: 154,
                    status: 1,
                },
            ],
            function (err, res) {
                assert.equal(null, err);
                console.log(res.result.n + " items insert");
                client.close();
            }
        );
    });

    db.collection("orders").aggregate(
        [
            {
                $lookup: {
                    from: "products",
                    localField: "product_id",
                    foreignField: "_id",
                    as: "orderdetails",
                },
            },
        ],
        function (err, res) {
            assert.equal(null, err);
            // console.log(JSON.stringify(res));
            console.log(res);
            client.close();
        }
    );

    // drop collection
    db.collection("products").drop(function (err, res) {
        if (res) console.log("Collection deleted");
        client.close();
    });
});

var MongoClient = require("mongodb").MongoClient;
var DB_CONN_STR = "mongodb://localhost:27017/runoob";

var insertData = function (db, callback) {
    //连接到表 site
    var collection = db.collection("site");
    //插入数据
    var data = [
        { name: "菜鸟教程", url: "www.runoob.com" },
        { name: "菜鸟工具", url: "c.runoob.com" },
    ];
    collection.insert(data, function (err, result) {
        if (err) {
            console.log("Error:" + err);
            return;
        }
        callback(result);
    });
};

MongoClient.connect(DB_CONN_STR, function (err, db) {
    console.log("连接成功！");
    insertData(db, function (result) {
        console.log(result);
        db.close();
    });
});
