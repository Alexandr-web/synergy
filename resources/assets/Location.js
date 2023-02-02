class Location {
  constructor() {
    this.locaction = window.location;
    this.history = window.history;
  }

  push(path) {
    this.locaction.replace(path);
  }

  go(delta) {
    this.history.go(delta);
  }

  getIdFromPathName(before = "", after = "") {
    const regexp = new RegExp(`${before}\/\\d+${after ? `\/${after}` : ""}`);
    const findId = this.locaction.pathname.match(regexp);

    return findId ? findId[0].match(/\d+/)[0] : "";
  }
}

export default Location;