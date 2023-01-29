class Location {
  push(path) {
    window.location.replace(path);
  }

  go(delta) {
    window.history.go(delta);
  }
}