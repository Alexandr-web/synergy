class Cookie {
  _getExp(hours) {
    const date = new Date();

    date.setTime(date.getTime() + (hours * 60 * 60 * 1000));

    return "; expires=" + date.toUTCString();
  }

  set(name, value, hours) {
    const exp = this._getExp(hours);

    document.cookie = `${name}=${value}${exp}; path=/`;
  }

  get(name) {
    const nameEQ = `${name}=`;
    const list = document.cookie.split(";");

    for (let i = 0; i < list.length; i++) {
      let c = list[i];

      while (c.charAt(0) === " ") c = c.substring(1, c.length);

      if (c.indexOf(nameEQ) === 0) {
        return c.substring(nameEQ.length, c.length);
      }
    }

    return "";
  }

  remove(name) {
    document.cookie = `${name}=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;`;
  }
}

export default Cookie;