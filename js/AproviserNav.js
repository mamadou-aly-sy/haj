class AproviserNav extends React.Component {
  render() {
    return (
      <React.Fragment>
        <li className="nav-items">
          <a href="../pages/listes_cat.php" className="nav-link text-white btn">
            G. Gatégories
          </a>
        </li>
        <li className="nav-items">
          <a
            href="../pages/listes_prod.php"
            className="nav-link text-white btn"
          >
            G. Produits
          </a>
        </li>
        <li className="nav-items">
          <a
            href="../pages/listes_four.php"
            className="nav-link text-white btn"
          >
            G. Fornisseurs
          </a>
        </li>
      </React.Fragment>
    );
  }
}

ReactDOM.render(<AproviserNav />, document.getElementById("aproviser-nav"));
