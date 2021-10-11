/**
 * Common script.
 * @author Tomas
 */
(function($) {
/* ---------------------------------------------------------------------------- */

  // Document ready.
  $(function() {
    $('form.validate').submit(formValidator)
  })

  /**
 * Form validator.
 * @return bool
 */
  function formValidator() {
    let submit = true
    $(this).find('input.required').each(function() {
      if (this.value === '') {
        this.focus()
        submit = false
      }
      return submit
    })
    return submit
  }

/* ---------------------------------------------------------------------------- */
})(window.jQuery)
