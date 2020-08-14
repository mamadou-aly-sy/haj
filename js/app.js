const styles = (hours, minutes, seconds) => ({
  hours: {
    height: 5,
    transform: 'rotateZ(' + ((hours * 30) + (minutes * 0.5)) + 'deg)',
    width: 70
  },
  minutes: {
    height: 2.5,
    transform: 'rotateZ(' + ((minutes * 6) + (seconds * 0.1)) + 'deg)',
    width: 85
  },
  seconds: {
    height: 1,
    transform: 'rotateZ(' + seconds * 6 + 'deg)',
    width: 100
  }
})
const hourDeg = (360 / 12) + ((360 / 12) / 60)
class App extends React.Component {
  render() {
    const date = new Date()
    return (
      <main>
        <AnalogClock date={date} />
        <NumericClock date={date} />
        <Footer />
      </main>
    )
  }
}

const Footer = () => {
  return (
    <footer>
      <p>Elhadj@reactjs.org</p>
    </footer>
  )
}

const NumericClock = (props) => {
  return (
    <figcaption>
      {props.date.toLocaleTimeString()}
    </figcaption>
  )
}

const AnalogClock = (props) => {
  let hours = props.date.getHours()
  if (hours > 12) { hours = hours - 12 }
  const minutes = props.date.getMinutes()
  const seconds = props.date.getSeconds()
  return (
    <figure>
      <span style={styles(hours, minutes, seconds).hours} />
      <span style={styles(hours, minutes, seconds).minutes} />
      <span style={styles(hours, minutes, seconds).seconds} />
    </figure>
  )
}

function tick() {
  ReactDOM.render(<App date={new Date()} />, document.getElementById('root'));
}

setInterval(tick, 1000);