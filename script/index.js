/**
 * Index page script.
 * @author Tomas
 */
(function(browser, $) {
/* ---------------------------------------------------------------------------- */

  // Globals.
  let lastMinute

  // Document ready.
  $(function() {
    $('#note_read').click(function() {
      readNote()
      return false
    })
    $('#note_save').click(function() {
      saveNote()
      return false
    })
    $('body').ajaxError(function(event, xhr) {
      alert(xhr.status + ' - ' + xhr.statusText)
    })
    const info = []
    const now = new Date()
    if (browser.vendor) { info.push(browser.vendor) }
    if (browser.name) { info.push(browser.name) }
    if (browser.version) { info.push(browser.version) }
    $('#info_browser td').html(info.join(' '))
    $('#info_date td').html(getDate(now))
    $('#info_time td').html(getTime(now))
    lastMinute = now.getMinutes()
    setInterval(onTimeUpdate, 1000)
  })

  /**
 * On time update.
 */
  function onTimeUpdate() {
    const now = new Date()
    const min = now.getMinutes()
    if (min !== lastMinute) {
      $('#info_time td').html(getTime(now))
      lastMinute = min
      if (min === 0 && now.getHours() === 0) {
        $('#info_date td').html(getDate(now))
      }
    }
  }

  /**
 * Get day.
 * @param date Date
 * @return int
 */
  function getDay(date) {
    return (date.getDay() + 6) % 7
  }

  /**
 * Get date.
 * @param date Date
 * @return string
 */
  function getDate(date) {
    let day
    switch (getDay(date)) {
      case 0: day = 'monday'; break
      case 1: day = 'tuesday'; break
      case 2: day = 'wednesday'; break
      case 3: day = 'thursday'; break
      case 4: day = 'friday'; break
      case 5: day = 'saturday'; break
      case 6: day = 'sunday'; break
    }
    let month
    switch (date.getMonth()) {
      case 0: month = 'january'; break
      case 1: month = 'february'; break
      case 2: month = 'mars'; break
      case 3: month = 'april'; break
      case 4: month = 'may'; break
      case 5: month = 'june'; break
      case 6: month = 'july'; break
      case 7: month = 'august'; break
      case 8: month = 'september'; break
      case 9: month = 'october'; break
      case 10: month = 'november'; break
      case 11: month = 'december'; break
    }
    return (day + ' ' + date.getDate() + ' ' + month + ' ' + date.getFullYear())
  }

  /**
 * Get time.
 * @param date Date
 * @return string
 */
  function getTime(date) {
    let hr = date.getHours()
    let min = date.getMinutes()
    if (hr < 10) { hr = '0' + hr }
    if (min < 10) { min = '0' + min }
    return (hr + ':' + min)
  }

  /**
 * Read note.
 */
  function readNote() {
    $.post('action.php?action=read_note', {
      action_allowed: 'yes',
      action_redirect: 'no',
      note_id: 1,
    }, function(data) {
      $('#note_box textarea').val(data)
    })
  }

  /**
 * Save note.
 */
  function saveNote() {
    $.post('action.php?action=save_note', {
      action_allowed: 'yes',
      action_redirect: 'no',
      note_id: 1,
      note_text: $('#note_box textarea').val(),
    }, function(data) {
      alert(data)
    })
  }

/* ---------------------------------------------------------------------------- */
})(window.browser, window.jQuery)
