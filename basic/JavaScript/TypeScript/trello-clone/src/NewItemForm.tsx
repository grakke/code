import { useState } from "react"
import { NewItemButton, NewItemFormContainer, NewItemInput } from "./styles"
import { useFocus } from "./utils/useFocus"

type NewItemFormProps = {
    onAdd(text: string): void
}

const handleAddText = (event: React.KeyboardEvent<HTMLInputElement>) => {
    if (event.key === "Enter") {
        onAdd(text)
    }
}


export const NewItemForm = ({ onAdd }: NewItemFormProps) => {
    const [text, setText] = useState("")
    const inputRef = useFocus()

    return (
        <NewItemFormContainer>
            <NewItemInput
                ref={inputRef}
                value={text}
                onChange={e => setText(e.target.value)}
                onKeyPress={handleAddText} />
            <NewItemButton onClick={() => onAdd(text)}> Create</NewItemButton>
        </NewItemFormContainer>
    )
}