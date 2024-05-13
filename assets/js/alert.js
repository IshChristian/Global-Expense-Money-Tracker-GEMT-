$("#swal-7").click(function() {
    swal({
      title: 'What is your name?',
      content: {
      element: 'form',
      attributes: {
        action: 'spendingbudget.php',
        method: 'post',

      },
      element: 'input',
      attributes: {
        placeholder: 'Type your name',
        type: 'text',
        name: 'addamount',

      },
      },
    }).then((data) => {
      swal('Hello, ' + data + '!');
    });
  });