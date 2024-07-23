const Header = ({ name }) => <h2>Component: {name} </h2>

const Part = ({ info }) => {
  return (
    <p>
      {info.name}: {info.exercises}
    </p>
  )
}

const Content = ({ parts }) => (
  parts.map(part =>
    <div key={part.id} >
      <Part info={part} />
    </div>
  )
)

const Course = ({ course }) => {
  const total = course.parts.reduce((s, p) => s + p.exercises, 0)

  return (
    <div>
      <Header name={course.name} />
      <Content parts={course.parts} />
      <div>total of {total} exercises</div>
    </div>
  )
}

export default Course
