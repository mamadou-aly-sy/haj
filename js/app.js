class Footer extends React.Component {
  constructor(props) {
    super(props);
    this.state = { date: new Date() };
  }

  componentDidMount() {
    this.timerID = setInterval(() => this.runTimer(), 1000);
  }

  componentWillUnmount() {
    clearInterval(this.timerID);
  }

  runTimer() {
    this.setState({
      date: new Date(),
    });
  }

  render() {
    return (
      <footer>
        <p>{this.state.date.toLocaleTimeString()}</p>
        <small>Elhadj@reactjs.org</small>
      </footer>
    );
  }
}

ReactDOM.render(<Footer />, document.getElementById("root"));
