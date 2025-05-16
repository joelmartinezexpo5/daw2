export default class ValidacionError extends Error {
  constructor(message, campo) {
    super(message);
    this.name = "ValidacionError";
    this.campo = campo;
  }
}
