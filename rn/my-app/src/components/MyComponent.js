import React from 'react';

class MyCompontent extends React.Component {
    constructor(props) {
        super(props);
        // 创建一个 ref 来存储 textInput 的 DOM 元素
        this.textInput = React.createRef();
        // 为了在回调中使用 `this`，这个绑定是必不可少的
        this.focusTextInput = this.focusTextInput.bind(this);
    }

    focusTextInput() {
        // 直接使用原生 API 使 text 输入框获得焦点
        // 注意：我们通过 "current" 来访问 DOM 节点
        this.textInput.current.focus();
    }

    render() {
        // 告诉 React 我们想把 <input> ref 关联到
        // 构造器里创建的 `textInput` 上
        return (
            <div>
                <input
                    type="text"
                    ref={this.textInput} />
                <input
                    type="button"
                    value="Focus the text input"
                    onClick={this.focusTextInput}
                />
            </div>
        );
    }
}

export default MyCompontent
