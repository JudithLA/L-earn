$(document).ready(function () {

	var showAllRewards = function () {

		var url = "http://localhost:8888/L-earn/web/rewardsStudent/rewardsStudent.php";

		var data = {
			action : "getRewards"
		};

		$.ajax({
			url: url,
			data: data,
			method: "POST",

			success: function (result) {

				resultArray = JSON.parse(result);

				resultArray.forEach(function(elem){

					var linkReward = document.createElement('a');
					linkReward.setAttribute('href', elem.RecomId);
					linkReward.setAttribute('class', 'reward');

					var nameReward = document.createElement('div');
					nameReward.innerHTML = elem.RecomName;

					var costReward = document.createElement('div');
					costReward.innerHTML = elem.RecomCost;

					var btnReward = document.createElement('input');
					btnReward.setAttribute('type', 'button');
					btnReward.setAttribute('value', 'Obtener recompensa');

					linkReward.append(nameReward);
					linkReward.append(costReward);
					linkReward.append(btnReward);

					if (elem.RelRecomId != null) {
						linkReward.setAttribute('class', 'disabled-reward');
						$('.disabled-reward').click(function(){
							return false;
						});

					}

					$('#rewards').append(linkReward);

				});
      },

			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
				alert(textStatus);
				alert(errorThrown);
			}

		});
	}

	showAllRewards();

});
