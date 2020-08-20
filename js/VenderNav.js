class VenderNav extends React.Component {
  render() {
    return (
      <React.Fragment>
        <li className="nav-items">
          <a href="../pages/listes_cli.php" className="nav-link text-white btn">
            G. Clients
          </a>
        </li>
        <li className="nav-items">
          <a href="../pages/listes_com.php" className="nav-link text-white btn">
            G. Commandes
          </a>
        </li>
      </React.Fragment>
    );
  }
}

ReactDOM.render(<VenderNav />, document.getElementById("vender-nav"));
