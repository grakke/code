const mongoose = require('mongoose')

if (process.argv.length < 3) {
  console.log('Please provide the password as an argument: node mongo.js <password>')
  process.exit(1)
}

const password = process.argv[2]
const url = `mongodb+srv://bluebird89:${password}@cluster0.1cwfs.mongodb.net/note-app?retryWrites=true&w=majority`
mongoose.connect(url, { useNewUrlParser: true, useUnifiedTopology: true, useFindAndModify: false, useCreateIndex: true })

const noteSchema = new mongoose.Schema({
  content: String,
  date: Date,
  important: Boolean,
})
const Note = mongoose.model('Note', noteSchema)

// Note.find({}).then(result => {
//   result.forEach(note => {
//     console.log(note)
//   })
//   mongoose.connection.close()
// })

const note = new Note({
  content: 'HTML is Easy',
  date: new Date(),
  important: true,
})

note.save().then(result => {
  console.log('note saved!')
  mongoose.connection.close()
})


// const MongoClient = require('mongodb').MongoClient;
// const uri = "mongodb + srv://bluebird89:${password}@cluster0.1cwfs.mongodb.net";
// const client = new MongoClient(uri, { useNewUrlParser: true });
// client.connect(err => {
//   const collection = client.db("test").collection("students")
//     .then(db => console.log('DB conectada'))
//     .catch(err => console.log(error));
// });

// var url = 'mongodb + srv://bluebird89:${password}@cluster0.1cwfs.mongodb.net/note-app';
// MongoClient.connect(url, function (err, db) {
//   if (err) {
//     console.error(err);
//     return;
//   } else {
//     console.log("Connected correctly to server");
//     db.close();
//   }
// });