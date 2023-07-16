import React, { useState } from 'react';

const History = (props) => {
	if (props.allClicks.length === 0) {
		return (
			<div>
				the app is used by pressing the buttons
			</div>
		)
	}

	return (
		<div>
			button press history: {props.allClicks.join(' ')}
		</div>
	)
}

const Button = (props) => {
	console.log(props)
	const { onClick, text } = props
	return (
		<button onClick={onClick}>
			{text}
		</button>
	)
}

const Complex = () => {

	const [left, setLeft] = useState(0)
	const [right, setRight] = useState(0)
	const [allClicks, setAll] = useState([])

	const [clicks, setClicks] = useState({
		left: 0, right: 0
	})

	const handleLeftClick = () => {
		const newClicks = {
			...clicks,
			left: clicks.left + 1
		}
		setClicks(newClicks)
		setAll(allClicks.concat('L'))
		setLeft(left + 1)
	}

	const handleRightClick = () => {
		const newClicks = {
			// { ...clicks } 创建了一个新对象，该对象是具有 clicks 对象的所有属性的副本
			...clicks,
			right: clicks.right + 1
		}
		setClicks(newClicks)
		setAll(allClicks.concat('R'))
		setRight(right + 1)
	}

	return (
		<div>
			{clicks.left}
			<Button onClick={handleLeftClick} text='left' />
			<Button onClick={handleRightClick} text='right' />
			{clicks.right}
			<History allClicks={allClicks} />
		</div>
	)
}

export default Complex
