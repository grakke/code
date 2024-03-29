
import { createContext } from "react"
const AppStateContext = createContext()
type AppStateContextProps = {
    lists: List[]
    getTasksByListId(id: string): Task[]
}
const appData: AppState = {
    lists: [
        {
            id: "0",
            text: "To Do",
            tasks: [{ id: "c0", text: "Generate app scaffold" }]
        },
        {
            id: "1",
            text: "In Progress",
            tasks: [{ id: "c2", text: "Learn Typescript" }]
        },
        {
            id: "2",
            text: "Done",
            tasks: [{ id: "c3", text: "Begin to use static typing" }]
        }
    ]
}
type Task = {
    id: string
    text: string
}
type List = {
    id: string
    text: string
    tasks: Task[]
}

export type AppState = {
    lists: List[]
}