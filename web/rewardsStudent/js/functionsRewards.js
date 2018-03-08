$(document).ready(function () {
	var globals = {};
	globals.rewardId = 0;
	globals.costReward = 0;

	var url = "http://localhost:8888/L-earn/web/rewardsStudent/rewardsStudent.php";

	var sendCost = function (rewardId, costReward) {
		var data = {
			action: "updatePoints",
			costReward: costReward,
			rewardId: rewardId
		};

		$.ajax({
			url: url,
			data: data,
			method: "POST",
			success: function (result) {
				$(".popupReward").remove();
				$("#"+rewardId+"").removeClass("reward");
				$("#"+rewardId+"").addClass("reward disabled-reward");
				$(".reward").css("pointer-events", "auto");

				var pointsUpdate = JSON.parse(result);
				var previousValue = $("#headPoints").text();

				$("#headPoints").prop("Counter", previousValue).animate({
					Counter: pointsUpdate
				},{
					duration: 2000,
					easing: "swing",
					step: function (now) {
						$(this).text(Math.ceil(now));
					}
				});
			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
				alert(textStatus);
				alert(errorThrown);
			}
		});
	};

	var showAllRewards = function () {
		var data = {
			action: "getRewards"
		};

		$.ajax({
			url: url,
			data: data,
			method: "POST",
			success: function (result) {
				resultArray = JSON.parse(result);

				resultArray.forEach(function(elem){

					var linkReward = document.createElement("div");
					linkReward.setAttribute("class", "reward");
					linkReward.setAttribute("id", elem.RecomId);

					var nameReward = document.createElement("div");
					nameReward.innerHTML = elem.RecomName;

					var costReward = document.createElement("div");
					costReward.setAttribute("id", "costReward");

					var costRewardPoints = document.createElement("span");
					costRewardPoints.setAttribute("id", "costRewardPoints");
					costRewardPoints.innerHTML =elem.RecomCost;

					var costRewardData = document.createElement("span");
					costRewardData.innerHTML = " PTOS.";

					costReward.append(costRewardPoints);
					costReward.append(costRewardData);

					var btnReward = document.createElement("button");
					btnReward.innerHTML = "Obtener recompensa";

					linkReward.append(nameReward);
					linkReward.append(costReward);
					linkReward.append(btnReward);

					$("#rewards").append(linkReward);

					showRewardsGotten();
				});
				$(".reward").click(function() {

					globals.rewardId = $(this).attr("id");
					globals.costReward = $(this).find("#costRewardPoints").text();

					var popupReward = document.createElement("div");
					popupReward.setAttribute("class", "popupReward");

					var popupClose = document.createElement("div");
					popupClose.setAttribute("class", "rewCancel popupRewardClose");
					popupClose.innerHTML = "CERRAR";

					var codeReward = document.createElement("div");
					codeReward.innerHTML = "Tu código es ";

					var codeNumber = document.createElement("span");
					codeNumber.setAttribute("id", "codeNumber");
					codeNumber.innerHTML = Math.floor((Math.random() * 10000) + 1);

					codeReward.append(codeNumber);

					var btnCodeYes = document.createElement("button");
					btnCodeYes.setAttribute("id", "rewYes");
					btnCodeYes.innerHTML = "Obtener";

					var btnCodeNo = document.createElement("button");
					btnCodeNo.setAttribute("class", "rewCancel");
					btnCodeNo.innerHTML = "Cancelar";

					popupReward.append(popupClose);
					popupReward.append(codeReward);
					popupReward.append(btnCodeYes);
					popupReward.append(btnCodeNo);

					$("body").append(popupReward);

					$(".reward").css("pointer-events", "none");

					$(".rewCancel").on("click", function() {
						$(".popupReward").remove();
						$(".reward").css("pointer-events", "auto");
					})

					$("#rewYes").on("click", function() {
						sendCost(globals.rewardId, globals.costReward);
					});

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

	var showRewardsGotten = function () {
		var data = {
			action: "getRewardsGotten"
		};

		$.ajax({
			url: url,
			data: data,
			method: "POST",
			success: function (result) {
				resultArray = JSON.parse(result);

				resultArray.forEach(function(elem){
					if (elem.RelRecomId != null) {
						$("#"+elem.RelRecomId).addClass("disabled-reward");
					}
				});

      		},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
				alert(textStatus);
				alert(errorThrown);
			}

		});
	}

});
