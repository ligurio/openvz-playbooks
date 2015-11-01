# OpenVZ Playbooks

ansible playbooks/files/etc repository for [OpenVZ](https://openvz.org/)
infrastructure:
{bugzilla,[ci](https://ci.openvz.org/),[docs](https://docs.openvz.org/),[download](https://download.openvz.org/),[forum](https://forum.openvz.org/),git,[lists](https://lists.openvz.org/),[mirrors](http://mirrors.openvz.org/),[planet](http://planet.openvz.org/),[stats](https://stats.openvz.org/),[store](http://store.openvz.org/),[vault](http://vault.openvz.org/),[www](https://www.openvz.org/),[wiki](https://wiki.openvz.org/)}.openvz.org

OpenVZ is a powerful, easy to use, cost effective server virtualization solution
that empowers PC users with the ability to create completely networked, fully
portable, entirely independent virtual machines and Containers on a single
physical machine.

### Using

Try out availability of servers:

```
$ ansible all -i production  -a "/bin/echo hello"
```

In general to run any ansible playbook you will want to run:

```
$ ansible-playbook site.yml -i stage
$ ansible-playbook site.yml -i stage --limit mirrors
```

Gather facts on OpenVZ GIT server:

```
$ ansible -i production -m setup git
```

### Scheduled check-diff

Every night a cron job runs over all playbooks under playbooks/{groups}{hosts}
with the ansible --check --diff options. A report from this is sent to
sysadmins. In the ideal state this report would be empty.

### Idempotency

All playbooks should be idempotent. Ie, if run once they should bring the
machine(s) to the desired state, and if run again N times after that they should
make 0 changes (because the machine(s) are in the desired state).
Please make sure your playbooks are idempotent.

### Can be run anytime

When a playbook or change is checked into ansible you should assume
that it could be run at ANY TIME. Always make sure the checked in state
is the desired state. Always test changes when they land so they don't
surprise you later.


### Infrastructure of other open source projects

* Fedora Linux: [code](https://infrastructure.fedoraproject.org/cgit/ansible.git/), [documentation]( https://infrastructure.fedoraproject.org/infra/docs/), [site](https://fedorahosted.org/fedora-infrastructure/), [wiki](http://fedoraproject.org/wiki/Infrastructure/GettingStarted)
* Gentoo Linux: [documentation](http://mirror.omnilance.com/centos/)
* Wikimedia: [wiki](https://wikitech.wikimedia.org/wiki/Main_Page), [code](https://github.com/wikimedia/operations-puppet), [blog](http://blog.wikimedia.org/2011/09/19/ever-wondered-how-the-wikimedia-servers-are-configured/)
* OpenStreetMap: [wiki](http://wiki.openstreetmap.org/wiki/Servers)
* OpenStack: [wiki](http://docs.openstack.org/infra/system-config/), [code](https://github.com/openstack-infra)
* Mageia Linux: [code](http://gitweb.mageia.org/infrastructure/puppet/), [wiki](https://wiki.mageia.org/en/Sysadmin_Team)
* Mozilla: [code](https://github.com/Mozilla-cIT/ansible-playbooks)

### How to contribute

* [How to submit a patch](https://openvz.org/How_to_submit_patches)
* [How to contribute to OpenVZ](https://openvz.org/Contribute)
