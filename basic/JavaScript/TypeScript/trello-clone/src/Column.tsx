import { FC } from "react"
import { AddNewItem } from "./AddNewItem"
import { ColumnContainer, ColumnTitle } from "./styles"

type ColumnProps = React.PropsWithChildren<{
    text: string
}>

export const Column: FC<ColumnProps> = ({ text, children }) => {
    return (
        <ColumnContainer> <ColumnTitle>{text}</ColumnTitle>
            {children}
            <AddNewItem
                toggleButtonText="+ Add another task"
                onAdd={console.log}
                dark
            />
        </ColumnContainer>
    )
}