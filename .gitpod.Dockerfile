FROM gitpod/workspace-full
RUN wget https://get.symfony.com/cli/installer -O - | bash

# Install custom tools, runtimes, etc.
# For example "bastet", a command-line tetris clone:
# RUN brew install bastet
#
# More information: https://www.gitpod.io/docs/config-docker/
