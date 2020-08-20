function Formulaire(props) {
	return (

		<React.Fragment>
			<div className="form-group-login" id="form" >
				<label for="">pseudo</label>
				<input type="username" name="pseudo" className="form-control" placeholder="Pseudo" />
			</div>
			<div className="form-group-login">
				<label for="">Mot de passe </label>
				<input type="password" name="password" className="form-control" placeholder="Mot de passe" />
			</div>
			<button type="submit" name="submit" className="btn btn-outline-success mt-4 mb-2">S'identifier</button>
		</React.Fragment>
	);
}
ReactDOM.render(<Formulaire />, document.querySelector("#fomulaire"));
