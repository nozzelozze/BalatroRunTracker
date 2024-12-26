--- STEAMODDED HEADER
--- MOD_NAME: Share Run
--- MOD_ID: ShareRun
--- MOD_AUTHOR: [nozzelozze]
--- MOD_DESCRIPTION: Share your run
--- DEPENDENCIES: [Steamodded>=1.0.0~ALPHA-0812d]

----------------------------------------------
------------MOD CODE -------------------------

function G.FUNCS.share_button(arg_736_0)
	G.SETTINGS.paused = true

end

local createOptionsRef = create_UIBox_win
function create_UIBox_win()
	local contents = createOptionsRef()
	local exit_button = UIBox_button({
		minw = 5,
		button = "exit_button",
		label = {
			"Exit Game"
		}
	})
	table.insert(contents. nodes[1].nodes[1].nodes[1].nodes[1].nodes[2].nodes[1].nodes[1].nodes[1].nodes, #contents.nodes[1].nodes[1].nodes[1].nodes[1].nodes[2].nodes[1].nodes[1].nodes[1].nodes + 1, exit_button)
	return contents
end

----------------------------------------------
------------MOD CODE END----------------------
