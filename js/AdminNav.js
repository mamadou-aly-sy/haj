class AdminNav extends React.Component {
  render() {
    return (
      <React.Fragment>
        <li className="nav-items">
          <a
            href="../pages/listes_users.php"
            className="nav-link text-white btn"
          >
            G. Utilisateurs
          </a>
        </li>
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

ReactDOM.render(<AdminNav />, document.querySelector("#admin-nav"));
