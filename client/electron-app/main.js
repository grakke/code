// Module to control application life.
// Module to create native browser window.
const { app, BrowserWindow } = require('electron')
// include the Node.js 'path' module at the top of your file
const path = require('node:path')

const createWindow = () => {
    const win = new BrowserWindow({
        width: 800,
        height: 600,
        webPreferences: {
            preload: path.join(__dirname, 'preload.js')
          }
    })

    win.loadFile('index.html')
}

// Keep a global reference of the window object, if you don't, the window will be closed automatically when the JavaScript object is garbage collected.
var mainWindow = null;

// Quit when all windows are closed.
app.on('window-all-closed', () => {
    if (process.platform !== 'darwin') app.quit()
})

// This method will be called when Electron has finished
// initialization and is ready to create browser windows.
app.whenReady().then(() => {
    createWindow()

    app.on('activate', () => {
        if (BrowserWindow.getAllWindows().length === 0) createWindow()
    })
})
